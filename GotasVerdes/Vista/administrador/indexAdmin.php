<?php
  session_start();
  if(!isset($_SESSION['admin'])){
    echo'
    <script>
      alert("Debes de iniciar sesión");
      window.location = "../../index.html";
    </script>
    ';
    session_destroy();
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/indexAdmin.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="../Index/icc-removebg-preview.png">

</head>

<body>
  <header>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i></label>
      <a href="indexAdmin.php" class="enlace"><span>Gotas</span>Verdes</a>
      <ul class="XD mostrar">
        <li><a class="active" href="inicioAdmin.php" target="iframeContenidoPagina">Inicio</a></li>
        <li><a href="../administrador/recolectores.php" target="iframeContenidoPagina">Recolectores</a></li>
        <li><a href="../administrador/adminSeleccionarRecolector.php" target="iframeContenidoPagina">Usuarios</a></li>
        <li><a href="../../Controlador/cerrarSession.php">Cerrar sesión</a></li>
    </nav>
  </header>

  <main>
    <iframe src="inicioAdmin.php" name="iframeContenidoPagina" width="100%" height="800px" frameborder="0"></iframe>
  </main>
</body>

</html>