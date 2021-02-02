<?php
$server = '3333333';
$database = 'goplay_local';
$username = '****';
$password = '********';
try {
  $pdoConn = new PDO("mysql:host=$server;dbname=$database",$username, $password);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>
