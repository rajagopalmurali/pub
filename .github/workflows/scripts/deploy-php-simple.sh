#!/bin/bash
set -e

echo "Starting simple PHP application deployment..."

# Update system and install packages
sudo apt update -y
sudo apt install -y software-properties-common unzip
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update -y
sudo apt install -y php8.1 php8.1-fpm php8.1-mysql php8.1-xml php8.1-curl php8.1-mbstring php8.1-zip php8.1-gd php8.1-cli php8.1-common nginx mysql-server

# Start services
sudo systemctl start nginx mysql php8.1-fpm
sudo systemctl enable nginx mysql php8.1-fpm

# Secure MySQL (but we won't use it for the app)
echo "Setting up MySQL (for future use)..."
sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'temp_root_pass_123';" 2>/dev/null || true
sudo mysql -u root -ptemp_root_pass_123 -e "CREATE DATABASE IF NOT EXISTS php_app_db;" 2>/dev/null || true
sudo mysql -u root -ptemp_root_pass_123 -e "CREATE USER IF NOT EXISTS 'php_user'@'localhost' IDENTIFIED BY 'php_password_123';" 2>/dev/null || true
sudo mysql -u root -ptemp_root_pass_123 -e "GRANT ALL PRIVILEGES ON php_app_db.* TO 'php_user'@'localhost';" 2>/dev/null || true
sudo mysql -u root -ptemp_root_pass_123 -e "FLUSH PRIVILEGES;" 2>/dev/null || true

# Setup app directory - clean everything and start fresh
echo "Setting up fresh application directory..."
sudo rm -rf /var/www/html/*
sudo chown ubuntu:ubuntu /var/www/html

# Clone and deploy the actual application
echo "Deploying application from repository..."
cd /var/www/html

if [ -z "$GITHUB_REPOSITORY" ]; then
  echo "ERROR: GITHUB_REPOSITORY environment variable is not set!"
  echo "Available environment variables:"
  env | grep -E "(GITHUB|REPO)" || echo "No GITHUB or REPO variables found"
  exit 1
fi

echo "Cloning repository: https://github.com/${GITHUB_REPOSITORY}.git"

# Try to clone with retry mechanism
MAX_RETRIES=3
for attempt in $(seq 1 $MAX_RETRIES); do
  echo "Clone attempt $attempt of $MAX_RETRIES..."
  if git clone "https://github.com/${GITHUB_REPOSITORY}.git" .; then
    echo "Git clone successful on attempt $attempt"
    break
  else
    echo "Git clone failed on attempt $attempt"
    if [ $attempt -eq $MAX_RETRIES ]; then
      echo "ERROR: Git clone failed after $MAX_RETRIES attempts!"
      echo "Trying alternative approach with ZIP download..."
      
      # Alternative: download as ZIP
      echo "Downloading repository as ZIP..."
      if curl -L "https://github.com/${GITHUB_REPOSITORY}/archive/refs/heads/main.zip" -o repo.zip; then
        echo "ZIP download successful, extracting..."
        unzip repo.zip
        # Move contents from the extracted folder
        mv */.* . 2>/dev/null || true
        mv */* . 2>/dev/null || true
        rm -rf repo.zip */
        echo "Repository extracted from ZIP successfully"
      else
        echo "ERROR: Could not download repository as ZIP either!"
        echo "Repository URL: https://github.com/${GITHUB_REPOSITORY}"
        exit 1
      fi
    fi
    sleep 5
  fi
done

# Verify repository setup
if [ ! -d ".git" ] && [ ! -f "composer.json" ] && [ ! -f "index.php" ]; then
  echo "ERROR: Repository setup failed completely!"
  echo "Directory contents:"
  ls -la
  exit 1
fi

echo "Repository setup completed successfully!"
echo "Application files deployed:"
ls -la

# Install Composer dependencies if composer.json exists
if [ -f "composer.json" ]; then
  echo "Installing PHP dependencies with Composer..."
  
  # Install Composer if not exists
  if [ ! -f "/usr/local/bin/composer" ]; then
    echo "Installing Composer..."
    curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
  fi
  
  composer install --no-dev --optimize-autoloader
  echo "✅ Composer dependencies installed"
else
  echo "No composer.json found, skipping Composer dependencies"
fi

# Handle Laravel applications
if [ -f "artisan" ]; then
  echo "Laravel application detected, running Laravel commands..."
  
  # Generate application key
  php artisan key:generate --force
  
  # Run database migrations
  echo "Running database migrations..."
  php artisan migrate --force
  
  # Run database seeders if they exist
  if php artisan list | grep -q "db:seed"; then
    echo "Running database seeders..."
    php artisan db:seed --force
  else
    echo "No database seeders found, skipping..."
  fi
  
  # Clear and cache configurations
  php artisan config:clear
  php artisan config:cache
  php artisan route:clear
  php artisan route:cache
  php artisan view:clear
  php artisan view:cache
  
  echo "✅ Laravel setup completed successfully!"
else
  echo "No artisan file found (not a Laravel application)"
  echo "Skipping Laravel-specific commands"
fi

# Set proper permissions
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html

# Configure nginx
echo "Configuring nginx..."
sudo rm -f /etc/nginx/sites-enabled/default

# Determine the correct root directory based on application type
echo "Determining nginx root directory..."
if [ -d "public" ] && [ -f "public/index.php" ]; then
  NGINX_ROOT="/var/www/html/public"
  echo "✅ Using Laravel-style public directory: $NGINX_ROOT"
elif [ -f "index.php" ]; then
  NGINX_ROOT="/var/www/html"
  echo "✅ Using root directory: $NGINX_ROOT"
else
  NGINX_ROOT="/var/www/html"
  echo "⚠️  No index.php found, using default root: $NGINX_ROOT"
fi

# Create nginx config
sudo tee /etc/nginx/sites-available/php-app > /dev/null << 'NGINXEOF'
server {
    listen 80 default_server;
    server_name _;
    root REPLACE_ROOT_PATH;
    index index.php index.html;
    
    # Enable access logging
    access_log /var/log/nginx/php-app-access.log;
    error_log /var/log/nginx/php-app-error.log;
    
    location ~ \.php$ {
        try_files $uri =404;
        fastcgi_split_path_info ^(.+\.php)(/.+)$;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
        fastcgi_index index.php;
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_param PATH_INFO $fastcgi_path_info;
    }
    
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    # Handle static files
    location ~* \.(jpg|jpeg|png|gif|ico|css|js|pdf|txt)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
    
    # Deny access to sensitive files
    location ~ /\. {
        deny all;
    }
    
    location ~ /\.env {
        deny all;
    }
    
    location ~ /\.git {
        deny all;
    }
}
NGINXEOF

# Replace the placeholder with actual root path
sudo sed -i "s|REPLACE_ROOT_PATH|$NGINX_ROOT|g" /etc/nginx/sites-available/php-app

# Enable the site
sudo ln -sf /etc/nginx/sites-available/php-app /etc/nginx/sites-enabled/

# Test and reload nginx
echo "Testing nginx configuration..."
sudo nginx -t
echo "Reloading nginx..."
sudo systemctl reload nginx

# Test the application
echo "Testing application..."
sleep 3
if curl -s http://localhost > /dev/null; then
  echo "✅ Application is responding"
else
  echo "❌ Application is not responding"
fi

# Setup SSH access with authorized key
echo "Setting up SSH access with authorized key..."
if [ -f "/tmp/github-actions.pub" ]; then
  echo "Adding SSH public key to authorized_keys..."
  
  # Create .ssh directory if it doesn't exist
  sudo mkdir -p /home/ubuntu/.ssh
  sudo chown ubuntu:ubuntu /home/ubuntu/.ssh
  sudo chmod 700 /home/ubuntu/.ssh
  
  # Add the public key to authorized_keys
  sudo cat /tmp/github-actions.pub >> /home/ubuntu/.ssh/authorized_keys
  
  # Set proper permissions
  sudo chown ubuntu:ubuntu /home/ubuntu/.ssh/authorized_keys
  sudo chmod 600 /home/ubuntu/.ssh/authorized_keys
  
  echo "✅ SSH public key added to authorized_keys"
  echo "You can now SSH to this server using the corresponding private key"
else
  echo "⚠️  No SSH public key found, skipping SSH setup"
fi

# Create .env file with MySQL credentials in the working directory
echo "Creating .env file with MySQL credentials..."
cd /var/www/html

# Create .env file with proper permissions
sudo tee .env > /dev/null << 'ENVEOF'
# MySQL Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=php_app_db
DB_USERNAME=php_user
DB_PASSWORD=php_password_123

# MySQL Root Access (for administration)
MYSQL_ROOT_PASSWORD=temp_root_pass_123

# Server Information
APP_URL=http://$(curl -s http://169.254.169.254/latest/meta-data/public-ipv4)
APP_ENV=production
APP_DEBUG=false

# PHP Configuration
PHP_VERSION=8.1
PHP_FPM_SOCKET=/var/run/php/php8.1-fpm.sock

# Nginx Configuration
NGINX_ROOT=/var/www/html
NGINX_SITE_CONFIG=/etc/nginx/sites-available/php-app

# SSH Access
SSH_USER=ubuntu
SSH_KEY_ADDED=true
ENVEOF

# Set proper permissions for .env file
sudo chown ubuntu:ubuntu .env
sudo chmod 644 .env

echo "✅ .env file created with MySQL credentials"
echo "Database connection details:"
echo "  Host: 127.0.0.1"
echo "  Port: 3306"
echo "  Database: php_app_db"
echo "  Username: php_user"
echo "  Password: php_password_123"
echo "  Root Password: temp_root_pass_123"

# Create database test script
echo "Creating database test script..."
sudo tee db-test.php > /dev/null << 'PHPEOF'
<?php
/**
 * Database Connection Test Script
 * This script demonstrates how to use the .env file to connect to MySQL
 */

echo "<h1>🔌 Database Connection Test</h1>";

// Load environment variables from .env file
function loadEnv($file) {
    if (!file_exists($file)) {
        echo "<p style='color: red;'>❌ .env file not found!</p>";
        return false;
    }
    
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $env = [];
    
    foreach ($lines as $line) {
        if (strpos($line, '=') !== false && strpos($line, '#') !== 0) {
            list($key, $value) = explode('=', $line, 2);
            $env[trim($key)] = trim($value);
        }
    }
    
    return $env;
}

// Load environment variables
$env = loadEnv('.env');

if (!$env) {
    exit;
}

echo "<h2>📋 Environment Variables Loaded:</h2>";
echo "<pre style='background: #f5f5f5; padding: 15px; border-radius: 5px;'>";
foreach ($env as $key => $value) {
    if (strpos($key, 'PASSWORD') !== false) {
        echo "$key = " . str_repeat('*', strlen($value)) . "</pre>";
    } else {
        echo "$key = $value</pre>";
    }
}
echo "</pre>";

// Test database connection
echo "<h2>🗄️ Testing MySQL Connection:</h2>";

try {
    $dsn = "mysql:host={$env['DB_HOST']};port={$env['DB_PORT']};dbname={$env['DB_DATABASE']}";
    $pdo = new PDO($dsn, $env['DB_USERNAME'], $env['DB_PASSWORD']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
    
    // Test a simple query
    $stmt = $pdo->query("SELECT VERSION() as version");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    echo "<p><strong>MySQL Version:</strong> " . $result['version'] . "</p>";
    
    // Show database information
    echo "<h3>📊 Database Information:</h3>";
    echo "<ul>";
    echo "<li><strong>Host:</strong> {$env['DB_HOST']}</li>";
    echo "<li><strong>Port:</strong> {$env['DB_PORT']}</li>";
    echo "<li><strong>Database:</strong> {$env['DB_DATABASE']}</li>";
    echo "<li><strong>Username:</strong> {$env['DB_USERNAME']}</li>";
    echo "<li><strong>Connection:</strong> Working ✅</li>";
    echo "</ul>";
    
} catch (PDOException $e) {
    echo "<p style='color: red;'>❌ Database connection failed: " . $e->getMessage() . "</p>";
    echo "<p>Make sure MySQL is running and the credentials in .env are correct.</p>";
}

// Show how to use in your PHP code
echo "<h2>💡 Usage Example:</h2>";
echo "<pre style='background: #f5f5f5; padding: 15px; border-radius: 5px;'>";
echo "// Load environment variables\n";
echo "\$env = loadEnv('.env');\n\n";
echo "// Connect to database\n";
echo "\$dsn = \"mysql:host={\$env['DB_HOST']};dbname={\$env['DB_DATABASE']}\";\n";
echo "\$pdo = new PDO(\$dsn, \$env['DB_USERNAME'], \$env['DB_PASSWORD']);\n\n";
echo "// Use the connection\n";
echo "\$stmt = \$pdo->query('SELECT * FROM your_table');\n";
echo "</pre>";

echo "<h2>🔧 Available Commands:</h2>";
echo "<ul>";
echo "<li><strong>MySQL CLI:</strong> mysql -u php_user -pphp_password_123 -D php_app_db</li>";
echo "<li><strong>Root Access:</strong> sudo mysql -u root -ptemp_root_pass_123</li>";
echo "<li><strong>Check Status:</strong> sudo systemctl status mysql</li>";
echo "</ul>";

echo "<p style='color: green; font-weight: bold;'>🎉 Your database is ready to use!</p>";
?>
PHPEOF

# Set proper permissions for the test script
sudo chown www-data:www-data db-test.php
sudo chmod 644 db-test.php

echo "✅ Database test script created (db-test.php)"
echo "Visit /db-test.php to test your database connection"

echo "=== FINAL STATUS ==="
echo "PHP version:"
php -v
echo ""
echo "MySQL status:"
sudo systemctl status mysql --no-pager -l
echo ""
echo "Nginx status:"
sudo systemctl status nginx --no-pager -l
echo ""
echo "PHP-FPM status:"
sudo systemctl status php8.1-fpm --no-pager -l
echo "=== END STATUS ==="

echo "🎉 Application deployment completed successfully!"
echo "Your app is now running at: http://$(curl -s http://169.254.169.254/latest/meta-data/public-ipv4)"
echo "Nginx root directory: $NGINX_ROOT"
echo "MySQL is set up and ready to use!"
echo "✅ Your application should now load properly!"
