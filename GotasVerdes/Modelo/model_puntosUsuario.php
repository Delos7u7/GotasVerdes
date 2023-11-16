<?php
function obtenerPuntosUsuario($id_recolecta, $pdo, $cantidad, $status) {
  $stmt = $pdo->prepare("CALL obtener_id_usuario(?)");
  $stmt->bindParam(1, $id_recolecta, PDO::PARAM_INT);
  $stmt->execute();
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if ($result) {
    $id_usuario = $result['id_usuario'];
    $stmt = $pdo->prepare("CALL obtener_puntos_usuario(?)");
    $stmt->bindParam(1, $id_usuario, PDO::PARAM_INT);
    $stmt->execute();
    $puntos = $stmt->fetchColumn();
    if ($puntos !== false) {
      $puntos += $cantidad * 5; 
      $stmt = $pdo->prepare("CALL modificar_puntos_usuario(?, ?)");
      $stmt->bindParam(1, $id_usuario, PDO::PARAM_INT);
      $stmt->bindParam(2, $puntos, PDO::PARAM_INT);
      $stmt->execute();
      $stmt = $pdo->prepare("CALL actualizar_estado_recolecta(?, ?)");
      $stmt->bindParam(1, $id_recolecta, PDO::PARAM_INT);
      $stmt->bindValue(2, 1, PDO::PARAM_INT); 
      $stmt->execute();
      echo'
      <script>
      window.location = "../Vista/recolector/inicioRecolector.php";     
      </script>
      ';
    } else {
      // Aquí puedes agregar el manejo en caso de que los puntos sean 0
    }
  } else {
    return "No se encontró ningún usuario con el ID de recolecta proporcionado";
  }
}
?>
