<?php
include 'conexionBD.php';
$id_usuario;
$sql="CALL ObtenerDatosUsuario(?)";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(1, $id_usuario, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
if ($result) {
  $nombreUsu = $result['nombre_usuario'];
  $correoUsu = $result['correo_usuario'];
  $telefonoUsu = $result['telefono_usuario'];
  $cont = $result['cont_usuario'];
} else {
  echo "No se encontró ningún resultado.";
}
?>