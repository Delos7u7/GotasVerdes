<?php
  $host = '127.0.0.1:3307';
  $database = 'gotasverdes';
  $username = 'root';
  $password = '';
  
  try {
      $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
      echo "Error de conexión a la base de datos: " . $e->getMessage();
  }
?>
