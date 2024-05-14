<?php
$servername = "localhost";
$username = "root";
$password = "1234";

try {
  $conn = new PDO("mysql:host=$servername;dbname=4whelss", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Não conectou: " . $e->getMessage();
}