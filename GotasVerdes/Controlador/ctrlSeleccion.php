<?php

include 'conexionBD.php';
include '../Modelo/model_asignacion.php';

$idRecolecta = $_GET['idRecolecta'];
$idRecolector = $_GET['idRecolector'];

include 'ctrlRecEmail.php';
$nombreRecolector;
$correoRecolector;
include 'emailRecolectaAsignada.php';
try {
    asignarRecolecta($pdo, $idRecolecta, $idRecolector);
    echo'
    <script>
    window.location = "../Vista/Administrador/inicioAdmin.php";
    </script>';
} catch (PDOException $e) {
    echo "Error al ejecutar el procedimiento almacenado: " . $e->getMessage();
}

?>
