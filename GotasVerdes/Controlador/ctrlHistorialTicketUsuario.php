<?php
session_start();

include 'conexionBD.php';

// Verificar si se recibió el ID de compra
if (isset($_POST['idCompra'])) {
    // Obtener el ID de compra desde la solicitud POST
    $idCompra = $_POST['idCompra'];

    // Obtener detalles de la compra (productos, cantidades y precios)
    $sqlDetallesCompra = "SELECT productos.nombre_producto, detalles_compra.cantidad, productos.precio
                          FROM detalles_compra
                          INNER JOIN productos ON detalles_compra.id_producto = productos.id_producto
                          WHERE detalles_compra.id_compra = :idCompra";
    
    $stmtDetallesCompra = $pdo->prepare($sqlDetallesCompra);
    $stmtDetallesCompra->bindParam(':idCompra', $idCompra, PDO::PARAM_INT);
    
    try {
        $stmtDetallesCompra->execute();
        $detallesCompra = $stmtDetallesCompra->fetchAll(PDO::FETCH_ASSOC);

        if ($detallesCompra) {
            // Calcular el total de la compra
            $totalCompra = 0;
            foreach ($detallesCompra as $detalle) {
                $totalCompra += $detalle['cantidad'] * $detalle['precio'];
            }

            // Obtener la fecha de la compra
            $sqlFechaCompra = "SELECT fecha_compra FROM compras WHERE id_compra = :idCompra";
            $stmtFechaCompra = $pdo->prepare($sqlFechaCompra);
            $stmtFechaCompra->bindParam(':idCompra', $idCompra, PDO::PARAM_INT);
            $stmtFechaCompra->execute();
            $fechaCompra = $stmtFechaCompra->fetchColumn();
            $stmtFechaCompra->closeCursor();

            // Devolver una respuesta JSON con todos los datos necesarios
            echo json_encode([
                'idCompra' => $idCompra,
                'fechaCompra' => $fechaCompra,
                'detallesCompra' => $detallesCompra,
                'totalCompra' => $totalCompra
            ]);
        } else {
            echo json_encode(['error' => 'No se encontraron detalles de compra para el ID proporcionado']);
        }
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo json_encode(['error' => 'Error en la consulta de detalles de compra: ' . $e->getMessage()]);
    }
} else {
    echo json_encode(['error' => 'ID de compra no proporcionado']);
}

// Asegúrate de que no haya salida adicional después de enviar JSON
exit();
?>