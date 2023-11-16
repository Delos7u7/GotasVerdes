<?php
include '../conexionBD.php';

if (isset($_POST['numeroTelefono'])) {
    $telefonoUsuario = $_POST['numeroTelefono'];
    $stmt = $pdo->prepare("CALL BuscarTelefono(:telefonoUsuarioBuscar)");
    $stmt->bindParam(':telefonoUsuarioBuscar', $telefonoUsuario, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        // Si se encuentra el número de teléfono en la base de datos, devuelve 'existe'
        echo 'existe';
    } else {
        // Si no se encuentra el número de teléfono en la base de datos, devuelve 'no existe'
        echo 'no existe';
    }
}
?>
