<?php
include '../conexionBD.php';

if (isset($_POST['correo'])) {
    $correoUsuario = $_POST['correo'];
    $stmt = $pdo->prepare("CALL BuscarCor(:correoUsuarioBuscar)");
    $stmt->bindParam(':correoUsuarioBuscar', $correoUsuario, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (count($result) > 0) {
        // Si se encuentra el correo electrónico en la base de datos, devuelve 'existe'
        echo 'existe';
    } else {
        // Si no se encuentra el correo electrónico en la base de datos, devuelve 'no existe'
        echo 'no existe';
    }
}
?>
