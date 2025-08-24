#!/bin/bash
set -e

echo "Starting PHP application deployment..."

# Update system and install packages
sudo apt update -y
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update -y
sudo apt install -y php8.1 php8.1-fpm php8.1-mysql php8.1-xml php8.1-curl php8.1-mbstring php8.1-zip php8.1-gd php8.1-cli php8.1-common nginx mysql-server

# Start services
sudo systemctl start nginx mysql php8.1-fpm
sudo systemctl enable nginx mysql php8.1-fpm

# Secure MySQL
sudo mysql -e "ALTER USER 'root'@'localhost' IDENTIFIED WITH mysql_native_password BY 'temp_root_pass_123';"
sudo mysql -u root -ptemp_root_pass_123 -e "CREATE DATABASE IF NOT EXISTS php_app_db;"
sudo mysql -u root -ptemp_root_pass_123 -e "CREATE USER IF NOT EXISTS 'php_user'@'localhost' IDENTIFIED BY 'php_password_123';"
sudo mysql -u root -ptemp_root_pass_123 -e "GRANT ALL PRIVILEGES ON php_app_db.* TO 'php_user'@'localhost';"
sudo mysql -u root -ptemp_root_pass_123 -e "FLUSH PRIVILEGES;"

# Setup app directory
sudo rm -rf /var/www/html/*
sudo chown ubuntu:ubuntu /var/www/html

# Clone repository
cd /var/www/html
git clone https://github.com/${GITHUB_REPOSITORY}.git . || {
  curl -L "https://github.com/${GITHUB_REPOSITORY}/archive/refs/heads/main.zip" -o repo.zip
  unzip repo.zip
  mv */.* . 2>/dev/null || true
  mv */* . 2>/dev/null || true
  rm -rf repo.zip */
}

# Install Composer and dependencies
if [ ! -f "/usr/local/bin/composer" ]; then
  curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
fi
composer install --no-dev --optimize-autoloader

# Create .env file
if [ -f ".env.example" ]; then
  cp .env.example .env
else
  cat > .env << 'ENVEOF'
APP_NAME="PHP App"
APP_ENV=production
APP_DEBUG=false
APP_URL=http://${PUBLIC_IP}
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=php_app_db
DB_USERNAME=php_user
DB_PASSWORD=php_password_123
ENVEOF
fi

# Set permissions
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html

# Laravel specific commands
if [ -f "artisan" ]; then
  php artisan key:generate --force
  php artisan config:cache
fi

# Configure nginx
sudo rm -f /etc/nginx/sites-enabled/default

# Determine root directory
if [ -d "public" ] && [ -f "public/index.php" ]; then
  NGINX_ROOT="/var/www/html/public"
else
  NGINX_ROOT="/var/www/html"
fi

# Create nginx config
sudo tee /etc/nginx/sites-available/php-app > /dev/null << 'NGINXEOF'
server {
    listen 80 default_server;
    server_name _;
    root REPLACE_ROOT_PATH;
    index index.php index.html;
    
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
}
NGINXEOF

# Replace placeholder and enable site
sudo sed -i "s|REPLACE_ROOT_PATH|$NGINX_ROOT|g" /etc/nginx/sites-available/php-app
sudo ln -sf /etc/nginx/sites-available/php-app /etc/nginx/sites-enabled/

# Test and reload nginx
sudo nginx -t
sudo systemctl reload nginx

echo "PHP application deployment completed successfully!"
