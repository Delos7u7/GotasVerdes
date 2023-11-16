
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
  $id_recolector ; // Asigna aquí el valor del ID del recolector deseado
  $stmt = $pdo->prepare("CALL recolectas_id(?)");
  $stmt->bindParam(1, $id_recolector, PDO::PARAM_INT);
  $stmt->execute();
  $recolectas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="../css/inicioRecolector.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@500;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="icon" href="../Index/icc-removebg-preview.png">

</head>

<body>
  <header>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i></label>
      <a href="inicioRecolector.php" class="enlace"><span>Gotas</span>Verdes</a>
      <ul class="XD mostrar">
        <li><a class="active" href="inicioRecolector.php">Inicio</a></li>
        <li><a href="#" data-bs-toggle="modal" data-bs-target="#ModalHistorial">Historial</a></li>
        <li><a href="../../Controlador/cerrarSession.php">Cerrar sesión</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <div class="container mt-3">
      <p class="table-title">Tareas pendientes</p>
      <table>
        <tr>
          <th>Tipo pendiente</th>
          <th>Datos</th>
          <th>Fecha</th>
          <th>Estatus entregado</th>
          <th>Acción</th> 
        </tr>
        <?php
        foreach ($recolectas as $recolecta) {
        ?>
        <tr>
          <td>Recolecta</td> 
          <td><img src="../../Vista/Index/gota.png" alt="" onclick="openModal('<?php echo $recolecta["nombreUsuario_recolecta"]; ?>', <?php echo $recolecta["cantidad_recolecta"]; ?>, '<?php echo $recolecta["direccion_recolecta"]; ?>')"></td>
          <td><?php echo $recolecta["fecha_recolecta"]; ?></td>
          <td><?php echo $recolecta["status_recolecta"] == 1 ? "Entregado" : "Pendiente"; ?></td>
          <td><button class="btn btn-secondary btn-success custom-btn" data-cantidad="<?php echo $recolecta['cantidad_recolecta']; ?>" data-status="<?php echo $recolecta['status_recolecta']; ?>" onclick="openConfirmModal(<?php echo $recolecta['id_recolecta']; ?>, <?php echo $recolecta['cantidad_recolecta']; ?>, <?php echo $recolecta['status_recolecta']; ?>)">Recolectar</button></td>
        </tr>
        <?php
        }
        ?>
      </table>
    </div>
  </main>
  <div id="myModal" class="modal">
    <div class="modal-content custom-modal-content d-flex justify-content-between align-items-center">
        <span class="close" onclick="closeModal()">&times;</span>
        <div>
        <button class="btn btn-success btnCerrarInfo" onclick="saveModalData()">Cerrar</button>
        </div>
    </div>
</div>


<div id="confirmModal" class="modal">
  <div class="modal-content d-flex justify-content-between align-items-center">
    <span class="close" onclick="closeConfirmModal()">&times;</span>
    <p>¿Estás seguro de que quieres marcar esta recolecta como completada?</p>
    <div>
    <button class="btn btn-danger" onclick="closeConfirmModal()">Cancelar</button>
      <button class="btn btn-success me-2" onclick="markAsCollected(confirmIdRecolecta, confirmCantidad, confirmStatus)">Confirmar</button>
    </div>
  </div>
</div>


<div class="modal" id="ModalHistorial">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Historial</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <iframe src="../recolector/historialRecolector.php" width="100%" height="100%" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>
<script src="../js/inicioRecolector.js"></script>
</body>
</html>