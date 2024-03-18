<?php
session_start();

define('BASE_URL','http://localhost/bookamin/');
define('BASE_DIR',__DIR__);

$host = "localhost";
$dbname = "bookamin";
$charset = "utf8mb4";
$user_host = "root";
$password_host = "";

$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user_host, $password_host);


?>