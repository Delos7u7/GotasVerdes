<?php
session_start();
include 'conexionBD.php';
include '../Modelo/model_login.php';

$user = $_POST['correo_tel'];
$pass = $_POST['pass'];

$login = new Login();
$verificarUsuario = $login->	BuscarUsuario($pdo, $user, $pass);
$verificarRecolector = $login->	BuscarRecolector($pdo, $user, $pass);
$verificarAdmin = $login->	BuscarAdministrador($pdo, $user, $pass);
if ($verificarUsuario > 0) {
    $_SESSION['usuario'] = $user;
    echo '
    <script>
     window.location = "../Vista/usuario/inicioUsuario.php";     
    </script>
  ';
    exit;
} else  if($verificarRecolector > 0) {
    $_SESSION['recolector'] = $user;
    echo '
    <script>
     window.location = "../Vista/recolector/inicioRecolector.php";     
    </script>
  ';
    exit;
    }else if($verificarAdmin > 0){
        $_SESSION['admin'] = $user;
    echo '
    <script>
     window.location = "../Vista/administrador/indexAdmin.php";     
    </script>
   ';
    exit;
    }else{
    echo '
      <script>
       alert("Usuario o contraseña incorrecta");
       window.location = "../Vista/login/login.html";     
      </script>
    ';
    exit;
   }
?>
