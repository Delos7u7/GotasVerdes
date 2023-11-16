<?php
include 'conexionBD.php'; // Incluye el archivo de conexión
include_once '../Modelo/model_comentario.php'; // Incluye el modelo

$objComentario = new Comentario(); // Crea una instancia del modelo
$comentario = $_POST['txtComentario']; // Obtiene datos del formulario
$telefono = $_POST['txtTelefono'];
$correo = $_POST['txtCorreo'];

try {
    if (!empty($telefono) || !empty($correo)) {
        if ($objComentario->Comentar($pdo, $comentario, $telefono, $correo)) {
            echo'
            <script>
            window.location = "../Vista/usuario/inicioUsuario.php";     
            </script>
            ';
        } else {
            echo'
            <script>
            window.location = "../Vista/usuario/inicioUsuario.php";     
            </script>
            ';
        }
    } else {
        // Realiza alguna acción aquí si $telefono o $correo están vacíos
    }
} catch (PDOException $e) {
    echo "Error de PDO: " . $e->getMessage();
}
?>
