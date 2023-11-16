<?php
include 'conexionBD.php';
include '../Modelo/model_recolector.php'; 

$nom_recolector = $_POST['nom_recolector'];
$eda_recolector = $_POST['eda_recolector'];
$cor_recolector = $_POST['cor_recolector'];
$tel_recolector = $_POST['tel_recolector'];
$pas_recolector = $_POST['pas_recolector'];
$sta_recolector = 0;

$recolector = new Recolector();

if ($_FILES['ced_recolector']['error'] === UPLOAD_ERR_OK && $_FILES['lic_recolector']['error'] === UPLOAD_ERR_OK) {
    $carpeta_destino = '../Recolectores/' . $nom_recolector .'_'. $cor_recolector;

    if (!is_dir($carpeta_destino)) {
        mkdir($carpeta_destino, 0777, true);
    }

    $nombre_cedula = 'cedula_' . uniqid() . '_' . $_FILES['ced_recolector']['name'];
    $nombre_licencia = 'licencia_' . uniqid() . '_' . $_FILES['lic_recolector']['name'];

    $ruta_cedula = $carpeta_destino . '/' . $nombre_cedula;
    $ruta_licencia = $carpeta_destino . '/' . $nombre_licencia;

    if (move_uploaded_file($_FILES['ced_recolector']['tmp_name'], $ruta_cedula) && move_uploaded_file($_FILES['lic_recolector']['tmp_name'], $ruta_licencia)) {

        if ($recolector->insertarRecolector($pdo, $nom_recolector, $eda_recolector, $ruta_cedula, $ruta_licencia, $cor_recolector, $tel_recolector, $pas_recolector, $sta_recolector)) {
            echo '
                <script>
                    alert("Solicitud enviada, espere que su cuenta sea activada");
                    window.location = "../index.html";
                </script>
            ';
        } else {
            echo "Error al ejecutar el procedimiento almacenado.";
        }
    } else {
        echo "Error al mover los archivos a la carpeta de destino.";
    }
} else {
    echo "Error al cargar los archivos.";
}
?>
