<?php
include '../conexionBD.php';

if (isset($_POST['nombreUsuario'])) {
    $nombreUsuario = $_POST['nombreUsuario'];
    $stmt = $pdo->prepare("CALL BuscarPorNombreUsuario(:nombreUsuarioBuscar)");
    $stmt->bindParam(':nombreUsuarioBuscar', $nombreUsuario, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        // Si se encuentra el nombre de usuario en la base de datos, devuelve 'existe'
        echo 'existe';
    } else {
        // Si no se encuentra el nombre de usuario en la base de datos, devuelve 'no existe'
        echo 'no existe';
    }
}
?>