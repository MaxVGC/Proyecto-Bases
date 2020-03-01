<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
  

    $sql_details = array(
        "type" => "Postgres",    // Database type: "Mysql", "Postgres", "Sqlite" or "Sqlserver"
        "user" => "postgres",    // User name
        "pass" => "pkmn3612",    // Password
        "host" => "127.0.0.1",    // Database server
        "port" => "5432",    // Database port (can be left empty for default)
        "db"   => "proyecto",    // Database name
        "dsn"  => ""     // PHP DSN extra information. Set as `charset=utf8` if you are using MySQL
    );
    ?>