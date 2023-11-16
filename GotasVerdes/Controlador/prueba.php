<?php
// Verifica si se ha pasado el parámetro 'correo' en la URL
if (isset($_GET['correo'])) {
    // Obtiene el valor del parámetro 'correo'
    $correoRecolector = $_GET['correo'];

    // Puedes utilizar el valor del correo como desees, por ejemplo, imprimirlo
    echo "Correo del recolector: " . $correoRecolector;
} else {
    // Si no se proporciona el parámetro 'correo', maneja el caso de error o redirige a otra página
    echo "Error: No se proporcionó el correo del recolector.";
    // O redirige a otra página
    // header("Location: otraPagina.php");
}
?>
