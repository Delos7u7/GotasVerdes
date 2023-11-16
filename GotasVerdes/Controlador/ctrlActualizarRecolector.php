<?php
include 'conexionBD.php';
include '../Modelo/model_actualizarRecolector.php';
$nombreRecolector = $_POST['nombre'];
$nuevoCorreo = $_POST['correo'];
$nuevoTelefono = $_POST['telefono'];
$nuevoStatus =  $_POST['estado'];
actualizarRecolector($nombreRecolector, $nuevoCorreo, $nuevoTelefono, $nuevoStatus);
if($nuevoStatus==0){
  include 'emailRecolectorDesactivado.php';
  echo '
  <script>
    window.location.href="../Vista/administrador/recolectores.php";
  </script>
  ';
}elseif($nuevoStatus==1){
  include 'emailRecolectorActivado.php';
  echo '
  <script>
    window.location.href="../Vista/administrador/recolectores.php";
  </script>
  ';
}
?>
