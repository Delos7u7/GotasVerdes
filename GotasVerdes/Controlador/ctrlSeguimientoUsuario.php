<?php
session_start();

include 'conexionBD.php';

$userIdentifier = $_SESSION['usuario'];

// Obtener el último id_compra
$sqlLastPurchaseId = "
SELECT
    MAX(id_compra) AS last_purchase_id
FROM
    compras
JOIN
    usuarios ON compras.id_usuario = usuarios.id_usuario
WHERE
    usuarios.correo_usuario = :userIdentifier OR usuarios.telefono_usuario = :userIdentifier
";

try {
    // Preparar y ejecutar la consulta para obtener el último id_compra
    $stmtLastPurchaseId = $pdo->prepare($sqlLastPurchaseId);
    $stmtLastPurchaseId->bindParam(':userIdentifier', $userIdentifier, PDO::PARAM_STR);
    $stmtLastPurchaseId->execute();

    // Obtener el último id_compra
    $lastPurchaseIdResult = $stmtLastPurchaseId->fetch(PDO::FETCH_ASSOC);
    $lastPurchaseId = $lastPurchaseIdResult['last_purchase_id'];

    // Consulta para obtener detalles_compra de la última compra
    $sql = "
    SELECT
        c.id_compra,
        c.fecha_compra,
        c.status_compra,
        d.cantidad,
        p.id_producto,
        p.nombre_producto
    FROM
        compras c
    JOIN
        detalles_compra d ON c.id_compra = d.id_compra
    LEFT JOIN
        productos p ON d.id_producto = p.id_producto
    WHERE
        c.id_compra = :lastPurchaseId
    ";

    // Preparar y ejecutar la consulta
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':lastPurchaseId', $lastPurchaseId, PDO::PARAM_INT);
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mostrar los resultados (puedes ajustar esto según tus necesidades)
    echo json_encode($result);

} catch (PDOException $e) {
    // Manejar errores si es necesario
    echo json_encode(['error' => $e->getMessage()]);
}
?>