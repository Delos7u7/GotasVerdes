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
  $nombreRecolector = $_GET['nombre'];
  include '../../Controlador/ctrlDatosRecolector.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar perfil</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/configuracionRecolector.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="../Index/icc-removebg-preview.png">

</head>

<body class="fondo">
  <main>
    <div class="wrapper">
      <h2>Configurar</h2>
      <form id="configForm" action="../../Controlador/ctrlActualizarRecolector.php" method="post">
        <div class="input-box">
          <label>Nombre completo</label>
          <input type="text" name="nombre" required  id="nombre_recolector" value="<?php echo $nombreRecolector;?>" readonly>
        </div>
        <div class="input-box">
          <label>Correo eléctronico</label>
          <input type="email" name="correo" required  id="correo_recolector" value="<?php echo $correoRecolector;?>">
        </div>
        <div class="input-box">
          <label>Teléfono</label>
          <input type="tel" name="telefono" required  id="telefono_recolector" value="<?php echo $telefonoRecolector;?>">
        </div>
        <div class="input-box">
          <label>Estado</label>
          <input type="text" name="estado" required id="estado_recolector" value="<?php echo $statusRecolector;?>">
        </div>
        <button type="submit" class="btn-g">Guardar</button>
      </form>
    </div>
  </main>
</body>

</html>