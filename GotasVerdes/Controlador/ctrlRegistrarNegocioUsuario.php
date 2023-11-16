<?php
session_start();
include('conexionBD.php');

if (isset($_POST['nombre_negocio']) && isset($_POST['latitud']) && isset($_POST['longitud']) && isset($_POST['id_usuario'])) {
    $nombreNegocio = $_POST['nombre_negocio'];
    $latitud = $_POST['latitud'];
    $longitud = $_POST['longitud'];
    $idUsuario = $_POST['id_usuario'];

    // Prepara la llamada al procedimiento almacenado
    $sqlCallProcedure = "CALL InsertNegocio(:nombreNegocio, :latitud, :longitud, :idUsuario)";

    try {
        $stmt = $pdo->prepare($sqlCallProcedure);
        $stmt->bindParam(':nombreNegocio', $nombreNegocio, PDO::PARAM_STR);
        $stmt->bindParam(':latitud', $latitud, PDO::PARAM_STR);
        $stmt->bindParam(':longitud', $longitud, PDO::PARAM_STR);
        $stmt->bindParam(':idUsuario', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        echo '
            <script>
                window.location = "../Vista/usuario/mapaUsuario.php";
            </script>
        ';
    } catch (PDOException $e) {
        echo "Error al guardar el negocio: " . $e->getMessage();
    }
} else {
    echo "Error: Campos del formulario incompletos.";
}

?>