<?php 

$host = "localhost";
$user = "root";
$pass = "root";
$db   = "exam_db";
$conn;

try {
  $conn = new PDO("mysql:host={$host};dbname={$db};",$user,$pass);
} catch (Exception $e) {
  
}


 ?>