<?php
session_start();


$host = "localhost";
$dbname = "bookamin";
$charset = "utf8mb4";
$user_host = "root";
$password_host = "";

$connection = new PDO("mysql:host=$host;dbname=$dbname;charset=$charset", $user_host, $password_host);


?>