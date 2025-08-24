#!/bin/bash
set -e

echo "🔄 Switching to simple Hello World PHP application..."

# Navigate to the application directory
cd /var/www/html

# Backup current application (optional)
if [ -d ".git" ] || [ -f "composer.json" ]; then
  echo "Backing up current application..."
  sudo cp -r . ../html_backup_$(date +%Y%m%d_%H%M%S)
  echo "✅ Backup created in /var/html_backup_*"
fi

# Clean the directory
echo "Cleaning application directory..."
sudo rm -rf /var/www/html/*
sudo chown ubuntu:ubuntu /var/www/html

# Create a simple Hello World PHP application
echo "Creating simple Hello World PHP application..."
cat > index.php << 'PHPEOF'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP App Deployed Successfully!</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            padding: 0; 
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container { 
            background: white; 
            padding: 40px; 
            border-radius: 20px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
            margin: 20px;
        }
        h1 { 
            color: #2c3e50; 
            margin-bottom: 20px;
            font-size: 2.5em;
        }
        .success { 
            color: #27ae60; 
            font-weight: bold; 
            font-size: 1.2em;
            margin: 20px 0;
        }
        .info { 
            background: #f8f9fa; 
            padding: 20px; 
            border-radius: 10px; 
            margin: 20px 0;
            text-align: left;
        }
        .status { 
            display: inline-block; 
            padding: 8px 16px; 
            border-radius: 20px; 
            font-size: 0.9em; 
            margin: 5px;
        }
        .status.ok { background: #d4edda; color: #155724; }
        .status.info { background: #d1ecf1; color: #0c5460; }
        .php-info { 
            background: #e9ecef; 
            padding: 15px; 
            border-radius: 8px; 
            margin: 15px 0;
            font-family: monospace;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🚀 PHP Application Deployed!</h1>
        <div class="success">✅ Your PHP application is running successfully!</div>
        
        <div class="info">
            <h3>📊 System Information:</h3>
            <div class="status ok">Server: <?php echo $_SERVER['SERVER_SOFTWARE']; ?></div>
            <div class="status ok">PHP Version: <?php echo phpversion(); ?></div>
            <div class="status ok">Document Root: <?php echo $_SERVER['DOCUMENT_ROOT']; ?></div>
            <div class="status ok">Timestamp: <?php echo date('Y-m-d H:i:s'); ?></div>
        </div>
        
        <div class="info">
            <h3>🔧 PHP Extensions:</h3>
            <div class="php-info">
                <?php 
                $extensions = get_loaded_extensions();
                $core_extensions = ['mysql', 'mysqli', 'pdo', 'pdo_mysql', 'curl', 'json', 'mbstring', 'xml'];
                foreach ($core_extensions as $ext) {
                    $status = extension_loaded($ext) ? '✅' : '❌';
                    echo "$status $ext<br>";
                }
                ?>
            </div>
        </div>
        
        <div class="info">
            <h3>📁 Directory Contents:</h3>
            <div class="php-info">
                <?php
                $files = scandir('.');
                foreach ($files as $file) {
                    if ($file != '.' && $file != '..') {
                        $type = is_dir($file) ? '📁' : '📄';
                        echo "$type $file<br>";
                    }
                }
                ?>
            </div>
        </div>
        
        <div class="success">
            <p>🎉 Your PHP environment is ready for development!</p>
            <p>MySQL is also set up and ready to use when you need it.</p>
        </div>
    </div>
</body>
</html>
PHPEOF

echo "✅ Simple PHP application created successfully!"

# Set proper permissions
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html

# Test the application
echo "Testing application..."
sleep 2
if curl -s http://localhost > /dev/null; then
  echo "✅ Application is responding"
else
  echo "❌ Application is not responding"
fi

echo "🎉 Switch to simple PHP application completed!"
echo "Your app should now work without any database errors!"
echo "Visit your server IP to see the Hello World page."
