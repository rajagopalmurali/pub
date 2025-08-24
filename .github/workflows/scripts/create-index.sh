#!/bin/bash

if [ -d "public" ] && [ -f "public/index.php" ]; then
  echo "Using existing index.php in public directory"
elif [ -f "index.php" ]; then
  echo "Using existing index.php in root directory"
else
  echo "Creating index.php..."
  cat > index.php << 'PHPEOF'
<?php
echo "<h1>PHP Application Deployed Successfully!</h1>";
echo "<p>Server: " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>PHP Version: " . phpversion() . "</p>";
echo "<p>Timestamp: " . date('Y-m-d H:i:s') . "</p>";
echo "<p>Document Root: " . $_SERVER['DOCUMENT_ROOT'] . "</p>";
echo "<p>Current Directory: " . getcwd() . "</p>";
?>
PHPEOF
  echo "index.php created successfully"
fi
