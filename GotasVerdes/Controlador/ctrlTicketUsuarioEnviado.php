<?php
session_start();

include 'conexionBD.php';

$userEmail = $_SESSION['usuario'];

// Obtener el ID de usuario basado en el correo electrónico
$sqlUserId = "SELECT id_usuario FROM usuarios WHERE correo_usuario = :userEmail";
$stmtUserId = $pdo->prepare($sqlUserId);
$stmtUserId->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
$stmtUserId->execute();
$userId = $stmtUserId->fetchColumn();
$stmtUserId->closeCursor();

// Obtener el último id_compra y fecha_compra asociada al usuario
$sqlUltimaCompra = "SELECT id_compra, fecha_compra FROM compras WHERE id_usuario = :userId ORDER BY id_compra DESC LIMIT 1";
$stmtUltimaCompra = $pdo->prepare($sqlUltimaCompra);
$stmtUltimaCompra->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmtUltimaCompra->execute();
$ultimaCompra = $stmtUltimaCompra->fetch(PDO::FETCH_ASSOC);
$stmtUltimaCompra->closeCursor();

if ($ultimaCompra) {
    $idCompra = $ultimaCompra['id_compra'];
    $fechaCompra = $ultimaCompra['fecha_compra'];

    // Obtener detalles de la compra (productos, cantidades y precios)
    $sqlDetallesCompra = "SELECT productos.nombre_producto, detalles_compra.cantidad, productos.precio
                          FROM detalles_compra
                          INNER JOIN productos ON detalles_compra.id_producto = productos.id_producto
                          WHERE detalles_compra.id_compra = :idCompra";
    $stmtDetallesCompra = $pdo->prepare($sqlDetallesCompra);
    $stmtDetallesCompra->bindParam(':idCompra', $idCompra, PDO::PARAM_INT);
    $stmtDetallesCompra->execute();
    $detallesCompra = $stmtDetallesCompra->fetchAll(PDO::FETCH_ASSOC);
    $stmtDetallesCompra->closeCursor();

    // Devolver los datos como JSON
    echo json_encode(['idCompra' => $idCompra, 'fechaCompra' => $fechaCompra, 'detallesCompra' => $detallesCompra]);
} else {
    echo json_encode(['idCompra' => null, 'fechaCompra' => null, 'detallesCompra' => null]);
}

// Asegúrate de que no haya salida adicional después de enviar JSON
exit();
?>