<?php
  include 'conexionBD.php';
  try {
      $stmt = $pdo->prepare("CALL seleccionarInfoUsuarios()");
      $stmt->execute();
      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo json_encode($results); // Imprimir los resultados como JSON
  } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
  }
?>