<?php

$servername = 'localhost';
$dbUsername = 'root';
$dbPassword = 'BjJfzm3v0KHn';
$dbName = 'baseddealsdb';

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die('Connection failed: '.mysqli_connect_error());
}
