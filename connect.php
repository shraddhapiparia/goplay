<?php
$server = '127.0.0.1';
$database = 'goplay_local';
$username = 'root';
$password = 'root';
try {
  $pdoConn = new PDO("mysql:host=$server;dbname=$database",$username, $password);
} catch (PDOException $e) {
  die("Connection failed: " . $e->getMessage());
}
?>