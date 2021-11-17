<?php
$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName     = "smartfast";
$port       = 3306;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// Caso não tenha duas portas diferentes, não é necessário a variável porta com a concatenação
$conn = mysqli_connect($serverName . ':' . $port, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

