<?php
session_start();

include 'conexionBD.php';

$userIdentifier = $_SESSION['usuario'];

// Consulta para obtener la dirección de recolecta
$sqlRecolectaDireccion = "
SELECT
    r.direccion_recolecta
FROM
    recolecta r
JOIN
    usuarios u ON r.id_usuario = u.id_usuario
WHERE
    u.correo_usuario = :userIdentifier OR u.telefono_usuario = :userIdentifier
";

try {
    // Preparar y ejecutar la consulta para obtener la dirección de recolecta
    $stmtRecolectaDireccion = $pdo->prepare($sqlRecolectaDireccion);
    $stmtRecolectaDireccion->bindParam(':userIdentifier', $userIdentifier, PDO::PARAM_STR);
    $stmtRecolectaDireccion->execute();

    // Obtener la dirección de recolecta
    $recolectaDireccionResult = $stmtRecolectaDireccion->fetch(PDO::FETCH_ASSOC);
    $recolectaDireccion = $recolectaDireccionResult['direccion_recolecta'];

    // Mostrar la dirección de recolecta (puedes ajustar esto según tus necesidades)
    echo json_encode(['direccion_recolecta' => $recolectaDireccion]);

} catch (PDOException $e) {
    // Manejar errores si es necesario
    echo json_encode(['error' => $e->getMessage()]);
}
?>