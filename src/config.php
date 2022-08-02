<?php

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => (getenv('DB_C_HOST')) ? getenv('DB_C_HOST') : "localhost",
    "port" => "3306",
    "dbname" => "quinto_db",
    "username" => (getenv('DB_C_USER')) ? getenv('DB_C_USER') : "root",
    "passwd" => (getenv('DB_C_PASS')) ? (getenv('DB_C_PASS')) : "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);