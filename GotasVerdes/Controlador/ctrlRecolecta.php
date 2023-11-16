<?php
include 'conexionBD.php';
include '../Modelo/model_recolecta.php'; 
$nom_rec = $_POST['nom_rec'];
$can_rec = $_POST['can_rec'];
$dir_rec = $_POST['dir_rec'];
$status = 0;
$id_usuario =$_POST['id_usuario'];;
$recolecta = new recolecta();
if ($recolecta->InsertRecolecta($pdo, $nom_rec, $can_rec, $dir_rec, $status,$id_usuario)) {
    echo '
        <script>
            window.location = "../Vista/usuario/recolecta.php";
        </script>
    ';
} else {
    echo "Error al solicitar su recolecta";
}
?>