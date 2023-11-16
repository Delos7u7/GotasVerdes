<?php
include 'conexionBD.php';
try {
$stmt = $pdo->prepare("SELECT id_recolector, nombre_recolector FROM recolector WHERE status_recolector = 1");
$stmt->execute();
$recolectores = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
echo "Error: " . $e->getMessage();
}
?>