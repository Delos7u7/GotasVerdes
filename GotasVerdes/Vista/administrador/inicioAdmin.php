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
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/inicioAdmin.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Nunito:wght@500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="../Index/icc-removebg-preview.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    

</head>

<body>
<main>
        <div class="container mt-3">
            <p class="table-title">Recolectas Pendientes</p>
            <table id="tabla-dinamica">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Litros</th>
                        <th>Dirección</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Recolector</th> 
                    </tr>
                </thead>
                <tbody id="tbody-dinamico">
                </tbody>
            </table>
        </div>
    </main>

    <div class="modal" id="modalAsignarRecolector">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Asignar Recolector</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                include '../../Controlador/ctrlModalRecolectores.php';
                ?>
               
                <p>Selecciona un recolector:</p>
                <select id="selectRecolector">
                    <?php foreach ($recolectores as $recolector) : ?>
                        <option value="<?php echo $recolector['id_recolector']; ?>"><?php echo $recolector['nombre_recolector']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-success">Enviar</button>
            </div>
        </div>
    </div>
</div>

    
    <script src="../js/consultaRecolectas.js"></script>
</body>
</body>

</html>