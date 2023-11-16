<?php
  session_start();
  if(!isset($_SESSION['recolector'])){
    echo'
    <script>
      alert("Debes de iniciar sesión");
      window.location = "../../index.html";
    </script>
    ';
    session_destroy();
    die();
  }
  $recolector = $_SESSION['recolector'];
  include '../../Controlador/ctrlSesionRecolector.php'; 
  $id_recolector ; 
  $stmt = $pdo->prepare("CALL recolectas_completas(?)");
  $stmt->bindParam(1, $id_recolector, PDO::PARAM_INT);
  $stmt->execute();
  $recolectas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recuperar contraseña</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" href="../Index/icc-removebg-preview.png">
</head>

<body>
  <div class="container mt-3">
    <table class="table">
      <thead class="table-success">
        <tr>
          <th>Nombre</th>
          <th>Fecha</th>
          <th>Estado</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($recolectas as $recolecta) { ?>
          <tr>
            <td><?php echo $recolecta['nombreUsuario_recolecta']; ?></td>
            <td><?php echo $recolecta['fecha_recolecta']; ?></td>
            <td><?php echo $recolecta['status_recolecta'] == 1 ? 'Completado' : $recolecta['status_recolecta']; ?></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</body>
</html>