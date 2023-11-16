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
  <title>Usuarios</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/adminSeleccionarRecolector.css">
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
  <main>
    <div class="container mt-3">
      <p class="table-title">Usuarios</p>
      <table>
        <tr>
          <th>Nombre</th>
          <th>Correo</th>
          <th>Telefono</th>
        </tr>
        <tbody id="tbody-dinamico"> <!-- Agrega un id al tbody -->
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <!-- Puedes agregar más filas y columnas según sea necesario -->
        </tbody>
      </table>
    </div>
  </main>


  <script src="../js/informacionUsuario.js"></script>
</body>

</html>