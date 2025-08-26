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
        echo "$key = " . str_repeat('*', strlen($value)) . "\n";
    } else {
        echo "$key = $value\n";
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
