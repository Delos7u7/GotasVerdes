<?php
include 'conexionBD.php';

// Obtener el nombre del recolector del parámetro GET
$nombreRecolector = $_GET['nombre'];

// Llamar al procedimiento almacenado y almacenar los resultados en variables
$correoRecolector = '';
$telefonoRecolector = '';
$statusRecolector = '';

$stmt = $pdo->prepare("CALL ObtenerDatosRecolector(:nombre)");
$stmt->bindParam(':nombre', $nombreRecolector, PDO::PARAM_STR);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $nombreRecolector = $row['nombre_recolector'];
    $correoRecolector = $row['correo_recolector'];
    $telefonoRecolector = $row['telefono_recolector'];
    $statusRecolector = $row['status_recolector'];
}
?>

