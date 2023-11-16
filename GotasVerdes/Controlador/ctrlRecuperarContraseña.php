<?php
include 'conexionBD.php';
include '../Modelo/model_recuperarConUsuario.php';

$cor_recuperarUsuario = $_POST['cor_recuperacion'];
$result = buscarUsuarioPorCorreo($pdo, $cor_recuperarUsuario);
$result1= BuscarRecolectorPorCorreo($pdo, $cor_recuperarUsuario);
if (count($result) == 0 && count($result1) == 0) {
    echo '
        <script>
            alert("Este usuario no está registrado");         
            window.location = "../Vista/login/correo_recuperacion.php";    
        </script>
    ';
    exit();
}

$byte = random_bytes(5);
$token_recuperar = bin2hex($byte); // Definir el token_recuperar
include "ctrlEmailRecuperarUsuario.php";
$insertResult = InsertarRecuperarContrasena($pdo, $cor_recuperarUsuario, $token_recuperar, $codigo_recuperar);
if ($insertResult === true) {
    // Acciones adicionales si la inserción es exitosa
} else {
    echo $insertResult;
}
?>
