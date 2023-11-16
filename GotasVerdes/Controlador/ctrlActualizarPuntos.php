<?php
session_start();
include 'conexionBD.php';

// Obtiene el correo electrónico del usuario desde la sesión
$correoUsuario = $_SESSION['usuario'];

// Obtiene la cantidad de puntos que se desean actualizar (puedes pasarlo por AJAX)
$puntosActualizados = isset($_POST['puntos_actualizados']) ? intval($_POST['puntos_actualizados']) : 0;

// Llama al procedimiento almacenado para actualizar los puntos
$sqlLlamaProcedimiento = "CALL UpdateUserPoints(:correo_usuario, :puntos_actualizados)";

try {
    $stmtLlamaProcedimiento = $pdo->prepare($sqlLlamaProcedimiento);
    $stmtLlamaProcedimiento->bindParam(':correo_usuario', $correoUsuario, PDO::PARAM_STR);
    $stmtLlamaProcedimiento->bindParam(':puntos_actualizados', $puntosActualizados, PDO::PARAM_INT);
    $stmtLlamaProcedimiento->execute();

    echo json_encode(['mensaje' => 'Puntos actualizados correctamente.']);

} catch (PDOException $e) {
    echo json_encode(['error' => 'Error en la consulta SQL: ' . $e->getMessage()]);
}
?>