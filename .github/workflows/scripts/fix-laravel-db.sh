#!/bin/bash
set -e

echo "🔧 Fixing Laravel database issues..."

# Navigate to the application directory
cd /var/www/html

# Check if this is a Laravel application
if [ ! -f "artisan" ]; then
  echo "❌ This is not a Laravel application (no artisan file found)"
  exit 1
fi

echo "✅ Laravel application detected"

# Test database connection
echo "Testing database connection..."
if mysql -u php_user -pphp_password_123 -e "USE php_app_db; SELECT 'Database connection successful' as status;" 2>/dev/null; then
  echo "✅ Database connection is working"
else
  echo "❌ Database connection failed, recreating user..."
  
  # Recreate database user
  sudo mysql -e "DROP USER IF EXISTS 'php_user'@'localhost';"
  sudo mysql -e "CREATE USER 'php_user'@'localhost' IDENTIFIED BY 'php_password_123';"
  sudo mysql -e "GRANT ALL PRIVILEGES ON php_app_db.* TO 'php_user'@'localhost';"
  sudo mysql -e "FLUSH PRIVILEGES;"
  
  # Test connection again
  if mysql -u php_user -pphp_password_123 -e "USE php_app_db; SELECT 'Database connection successful' as status;" 2>/dev/null; then
    echo "✅ Database connection restored"
  else
    echo "❌ Database connection still failing"
    exit 1
  fi
fi

# Clear all Laravel caches
echo "Clearing Laravel caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# Run database migrations
echo "Running database migrations..."
php artisan migrate --force

# Run seeders if they exist
if php artisan list | grep -q "db:seed"; then
  echo "Running database seeders..."
  php artisan db:seed --force
else
  echo "No seeders found, skipping..."
fi

# Regenerate caches
echo "Regenerating caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Set proper permissions
echo "Setting file permissions..."
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html

# Set special permissions for storage and bootstrap/cache
if [ -d "storage" ]; then
  sudo chmod -R 775 storage
  echo "✅ Storage directory permissions set"
fi

if [ -d "bootstrap/cache" ]; then
  sudo chmod -R 775 bootstrap/cache
  echo "✅ Bootstrap cache directory permissions set"
fi

# Test the application
echo "Testing application..."
if curl -s http://localhost > /dev/null; then
  echo "✅ Application is responding"
else
  echo "❌ Application is not responding"
fi

echo "🎉 Laravel database fix completed!"
echo "Your application should now work without the 500 error."
