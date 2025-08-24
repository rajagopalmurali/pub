#!/bin/bash

echo "Checking for existing index files..."

if [ -d "public" ] && [ -f "public/index.php" ]; then
  echo "✓ Using existing index.php in public directory"
elif [ -f "index.php" ]; then
  echo "✓ Using existing index.php in root directory"
else
  echo "⚠️  No index file found, creating a default index.php..."
  
  # Determine the best location for index.php
  if [ -d "public" ]; then
    INDEX_LOCATION="public/index.php"
    echo "Creating index.php in public directory"
  else
    INDEX_LOCATION="index.php"
    echo "Creating index.php in root directory"
  fi
  
  cat > "$INDEX_LOCATION" << 'PHPEOF'
<?php
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "    <meta charset='UTF-8'>";
echo "    <meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "    <title>PHP Application Deployed Successfully!</title>";
echo "    <style>";
echo "        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }";
echo "        .container { background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }";
echo "        h1 { color: #2c3e50; border-bottom: 3px solid #3498db; padding-bottom: 10px; }";
echo "        .info { background: #ecf0f1; padding: 15px; border-radius: 5px; margin: 10px 0; }";
echo "        .success { color: #27ae60; font-weight: bold; }";
echo "        .warning { color: #f39c12; }";
echo "    </style>";
echo "</head>";
echo "<body>";
echo "    <div class='container'>";
echo "        <h1>🚀 PHP Application Deployed Successfully!</h1>";
echo "        <div class='info'>";
echo "            <p><strong>Server:</strong> " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "            <p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "            <p><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "            <p><strong>Current Directory:</strong> " . getcwd() . "</p>";
echo "            <p><strong>Script Path:</strong> " . __FILE__ . "</p>";
echo "            <p><strong>Timestamp:</strong> " . date('Y-m-d H:i:s') . "</p>";
echo "        </div>";
echo "        <h2>📁 Directory Contents:</h2>";
echo "        <div class='info'>";
echo "            <pre>";
$files = scandir('.');
foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
        $type = is_dir($file) ? '📁' : '📄';
        echo "$type $file\n";
    }
}
echo "            </pre>";
echo "        </div>";
echo "        <h2>🔧 PHP Info:</h2>";
echo "        <div class='info'>";
echo "            <p><strong>PHP SAPI:</strong> " . php_sapi_name() . "</p>";
echo "            <p><strong>Loaded Extensions:</strong> " . implode(', ', array_slice(get_loaded_extensions(), 0, 10)) . "...</p>";
echo "        </div>";
echo "        <div class='success'>";
echo "            <p>✅ Your PHP application is now running successfully!</p>";
echo "        </div>";
echo "    </div>";
echo "</body>";
echo "</html>";
?>
PHPEOF

  echo "✓ index.php created successfully at $INDEX_LOCATION"
  
  # Set proper permissions
  sudo chown www-data:www-data "$INDEX_LOCATION"
  sudo chmod 644 "$INDEX_LOCATION"
fi

echo "Index file setup completed!"
