<?php
include 'conexionBD.php';
include '../Modelo/model_cambioContraseña.php';

$gmail = $_POST['gmail'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$usuario = new Usuario();

if ($pass1 == $pass2) {
    $usuario->cambiarContrasena($pdo, $gmail, $pass1);
    echo '
    <script>
        alert("Contraseña modificada");
        window.location ="../Vista/login/login.html";          
    </script>
    ';
} else {
    echo '
    <script>
        alert("Las contraseñas no coinciden");
        window.location ="../Vista/login/contraseña_recuperacion.php";     
    </script>
    ';
}
?>