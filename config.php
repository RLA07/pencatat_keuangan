<?php
    // DEFINE ABSOLUTE PATH
    define('ROOT_PATH', __DIR__);

    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
    $host = $_SERVER['HTTP_HOST'];
    $project_path = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    define('BASE_URL', $protocol . $host . $project_path);


    // DEFINE DATABASE
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "db_keuangan";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>