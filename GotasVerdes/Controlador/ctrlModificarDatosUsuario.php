<?php
include 'conexionBD.php';
$id_usuario = $_POST['idUsuario'];
$nombre_usuario = $_POST['nom_usu'];
$correo_usuario = $_POST['cor_usu'];
$telefono_usuario = $_POST['tel_usu'];
$contraseña_usuario = $_POST['pas_usuario'];

$sql = "CALL ModificarUsuario(?, ?, ?, ?, ?)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $id_usuario, PDO::PARAM_INT);
    $stmt->bindParam(2, $nombre_usuario, PDO::PARAM_STR);
    $stmt->bindParam(3, $correo_usuario, PDO::PARAM_STR);
    $stmt->bindParam(4, $telefono_usuario, PDO::PARAM_STR);
    $stmt->bindParam(5, $contraseña_usuario, PDO::PARAM_STR);
    $stmt->execute();
    echo'
    <script>
    window.location = "../Vista/usuario/configuracionUsuario.php";
    </script>';
    
} catch (PDOException $e) {
    echo "Error al actualizar los datos: " . $e->getMessage();
}
?>
