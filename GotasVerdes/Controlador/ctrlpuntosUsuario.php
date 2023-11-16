<?php
include 'conexionBD.php';
include '../Modelo/model_puntosUsuario.php';

if (isset($_GET['id_recolecta']) && isset($_GET['cantidad']) && isset($_GET['status'])) {
  $id_recolecta = $_GET['id_recolecta'];
  $cantidad = $_GET['cantidad'];
  $status = $_GET['status'];
  $puntos = obtenerPuntosUsuario($id_recolecta, $pdo, $cantidad, $status);
  
} else {
  
}
?>
