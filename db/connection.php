<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection(
    array(
        "driver" => "mysql",
        "username" => AH::jEnv("DB_USERNAME"),
        "password" => AH::jEnv("DB_PASSWORD"),
        "database" => AH::jEnv("DB_DATABASE"),
        "host" => AH::jEnv("DB_HOST"),
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '',
        'strict' => false,
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
        ]
    )
);

$capsule->setAsGlobal();

$capsule->bootEloquent();

?>
