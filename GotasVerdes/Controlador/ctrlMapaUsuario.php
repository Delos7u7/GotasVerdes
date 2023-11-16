<?php
include 'conexionBD.php';

// Realiza una consulta para obtener las latitudes y longitudes de la tabla negocio
$sql = "SELECT latitud, longitud FROM negocio";
$stmt = $pdo->query($sql);

// Almacena los resultados en un array
$ubicaciones = array();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $ubicaciones[] = $row;
}

// Realiza una consulta adicional para obtener los nombres de los negocios
$sql2 = "SELECT nombre_negocio FROM negocio WHERE latitud = :latitud AND longitud = :longitud";
$nombreNegocios = array();

foreach ($ubicaciones as $ubicacion) {
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->bindParam(':latitud', $ubicacion['latitud'], PDO::PARAM_STR);
    $stmt2->bindParam(':longitud', $ubicacion['longitud'], PDO::PARAM_STR);
    $stmt2->execute();
    $nombreNegocio = $stmt2->fetch(PDO::FETCH_ASSOC);
    $nombreNegocios[] = $nombreNegocio;
}

// Combina las coordenadas con los nombres de los negocios
$datosCombinados = array();

foreach ($ubicaciones as $index => $ubicacion) {
    $datosCombinados[] = array(
        'latitud' => $ubicacion['latitud'],
        'longitud' => $ubicacion['longitud'],
        'nombre_negocio' => $nombreNegocios[$index]['nombre_negocio']
    );
}

// Devuelve los datos combinados en formato JSON
echo json_encode($datosCombinados);
?>