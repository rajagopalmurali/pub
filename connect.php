<?php

require __DIR__ . '/vendor/autoload.php';

error_reporting(E_ERROR);

session_start();

function loadEnvFile() {
    if (isset($_ENV['ROOT_DIR'])) {
        return;
    }
    $envKey = function_exists('apache_getenv') ? "key" : "key";
    $d = new \Psecio\SecureDotenv\Parser($envKey, __DIR__ . "/.env");

    // The contents here is the set of all decrypted values fron the .env
    foreach ($d->getContent() as $key => $value) {
        $_ENV[$key] = $value;
    }

    // env variables define them as constants as well
    foreach ($_ENV as $key => $val) {
        define("DOT_ENV_" . $key, $val);
    }
}

loadEnvFile();

include_once __DIR__ . "/db/connection.php";

?>
