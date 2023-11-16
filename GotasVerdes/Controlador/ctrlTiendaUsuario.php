<?php
session_start();

include 'conexionBD.php';

$userEmail = $_SESSION['usuario'];

$sqlCallProcedure = "CALL GetPointsByUserEmail(:userEmail, @userPoints)";
$stmt = $pdo->prepare($sqlCallProcedure);
$stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
$stmt->execute();

$stmt->closeCursor();
$stmt = $pdo->query("SELECT @userPoints AS userPoints");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $userPoints = $row['userPoints'];
    echo json_encode(['puntos' => $userPoints]);
} else {
    echo json_encode(['puntos' => 0]); // Si no se encontraron resultados, se devuelve 0 puntos.
}
?>