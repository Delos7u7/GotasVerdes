<?php
session_start();

include 'conexionBD.php';

$userEmail = $_SESSION['usuario'];

try {
    // Obtener el ID de usuario basado en el correo electrónico
    $sqlUserId = "SELECT id_usuario FROM usuarios WHERE correo_usuario = :userEmail";
    $stmtUserId = $pdo->prepare($sqlUserId);
    $stmtUserId->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
    $stmtUserId->execute();
    $userId = $stmtUserId->fetchColumn();
    $stmtUserId->closeCursor();

    // Insertar una nueva compra en la tabla compras
    $sqlInsertCompra = "INSERT INTO compras (id_usuario, fecha_compra) VALUES (:userId, CURRENT_DATE)";
    $stmtInsertCompra = $pdo->prepare($sqlInsertCompra);
    $stmtInsertCompra->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmtInsertCompra->execute();
    $compraId = $pdo->lastInsertId(); // Obtener el ID de la última compra insertada
    $stmtInsertCompra->closeCursor();

    // Productos seleccionados y sus cantidades desde la página HTML
    $productosSeleccionados = [
        ['id_producto' => 1, 'cantidad' => $_POST['input_minus_plus_1']],
        ['id_producto' => 2, 'cantidad' => $_POST['input_minus_plus_2']],
        ['id_producto' => 3, 'cantidad' => $_POST['input_minus_plus_3']],
        ['id_producto' => 4, 'cantidad' => $_POST['input_minus_plus_4']]
    ];

    // Insertar detalles de la compra en la tabla detalles_compra
    foreach ($productosSeleccionados as $producto) {
        // Verificar que la cantidad sea mayor que 0 antes de insertar en detalles_compra
        if ($producto['cantidad'] > 0) {
            $sqlInsertDetalleCompra = "INSERT INTO detalles_compra (id_compra, id_producto, cantidad) 
                                       VALUES (:compraId, :idProducto, :cantidad)";
            $stmtInsertDetalleCompra = $pdo->prepare($sqlInsertDetalleCompra);
            $stmtInsertDetalleCompra->bindParam(':compraId', $compraId, PDO::PARAM_INT);
            $stmtInsertDetalleCompra->bindParam(':idProducto', $producto['id_producto'], PDO::PARAM_INT);
            $stmtInsertDetalleCompra->bindParam(':cantidad', $producto['cantidad'], PDO::PARAM_INT);
            $stmtInsertDetalleCompra->execute();
            $stmtInsertDetalleCompra->closeCursor();
        }
    }

    // Envía una respuesta exitosa (objeto JSON vacío)
    echo json_encode([]);
} catch (Exception $e) {
    // Manejo de errores
    http_response_code(500); // Código de estado para error interno del servidor
    echo json_encode(['error' => $e->getMessage()]);
}
?>