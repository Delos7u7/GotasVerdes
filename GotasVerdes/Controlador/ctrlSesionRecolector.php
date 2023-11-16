<?php
include 'conexionBD.php';

$recolector = $_SESSION['recolector'];

$sql = "CALL GetRecolectorId(:correo, :telefono)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':correo', $recolector, PDO::PARAM_STR);
$stmt->bindParam(':telefono', $recolector, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if (isset($result['id_recolector'])) {
  $id_recolector = $result['id_recolector'];
} else {
  echo $result['message'];
}
?>
