<?php
// Tu código de conexión a la base de datos aquí
include 'conexionBD.php';
$query = $pdo->prepare("SELECT nombre_recolector, status_recolector FROM recolector");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($result);
?>
