<?php
include 'conexionBD.php';
include '../Modelo/model_usuario.php'; 

$nom_usu = $_POST['nom_usu'];
$cor_usu = $_POST['cor_usu'];
$tel_usu = $_POST['tel_usu'];
$con_usu = $_POST['pas_usu'];
$pun_usu = 0;

$usuario = new Usuario(); 
// Intenta insertar el usuario
if ($usuario->insertarUsuario($pdo, $nom_usu, $cor_usu, $tel_usu, $con_usu, $pun_usu)) {
    echo '
        <script>
            window.location = "../Vista/login/login.html";
        </script>
    ';
} else {
    echo "Error al ejecutar el procedimiento almacenado.";
}
?>
