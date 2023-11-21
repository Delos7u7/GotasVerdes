<?php
session_start();

include 'conexionBD.php';

$userEmail = $_SESSION['usuario'];

// Obtener los puntos del usuario
$sqlCallProcedure = "CALL GetPointsByUserEmail(:userEmail, @userPoints)";
$stmt = $pdo->prepare($sqlCallProcedure);
$stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
$stmt->execute();

$stmt->closeCursor();
$stmt = $pdo->query("SELECT @userPoints AS userPoints");
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if ($row) {
    $userPoints = $row['userPoints'];
} else {
    $userPoints = 0; // Si no se encontraron resultados, se devuelve 0 puntos.
}

// Obtener las compras del usuario
$query = "
    SELECT 
        c.id_compra,
        c.fecha_compra,
        p.nombre_producto,
        dc.cantidad,
        CASE
            WHEN p.nombre_producto = 'Playera' THEN 200
            WHEN p.nombre_producto = 'Taza' THEN 300
            WHEN p.nombre_producto = 'Termo' THEN 400
            WHEN p.nombre_producto = 'Mix' THEN 800
            ELSE 0
        END AS precio_unitario,
        dc.cantidad * 
        CASE
            WHEN p.nombre_producto = 'Playera' THEN 200
            WHEN p.nombre_producto = 'Taza' THEN 300
            WHEN p.nombre_producto = 'Termo' THEN 400
            WHEN p.nombre_producto = 'Mix' THEN 800
            ELSE 0
        END AS total
    FROM 
        compras AS c
    JOIN 
        detalles_compra AS dc ON c.id_compra = dc.id_compra
    JOIN 
        productos AS p ON dc.id_producto = p.id_producto
    JOIN 
        usuarios AS u ON c.id_usuario = u.id_usuario
    WHERE 
        u.correo_usuario = :userEmail OR u.telefono_usuario = :userEmail;
";

// Preparar y ejecutar la consulta
$stmt = $pdo->prepare($query);
$stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);
$stmt->execute();

// Obtener resultados
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Crear un array combinado con puntos y compras
$combinedData = [
    'puntos' => $userPoints,
    'compras' => $resultados,
];

// Mostrar resultados en formato JSON
echo json_encode($combinedData);
?>