<?php
include 'conexionBD.php';
$Usuario =$_SESSION['usuario'];
$sql = "CALL GetUsuarioId(:correo, :telefono)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':correo', $Usuario, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $Usuario, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($result['id_usuario'])) {
  $id_usuario = $result['id_usuario'];
} else {
  echo $result['message'];
}
?>