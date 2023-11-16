<?php
include 'conexionBD.php';
$nombreRecolector;
$sql = "CALL BuscarIdRecolectorPorNombre(?)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $nombreRecolector, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
  $idRecolector = $result['idRecolectorResult'];
} else {
  echo "No se encontró ningún resultado.";
}
?>
