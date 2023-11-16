<?php

function actualizarRecolector($nombreRecolector, $nuevoCorreo, $nuevoTelefono, $nuevoStatus) {
    global $pdo;
    $stmt = $pdo->prepare("CALL actualizarRecolector(:nombreRecolector, :nuevoCorreo, :nuevoTelefono, :nuevoStatus)");
    $stmt->bindParam(':nombreRecolector', $nombreRecolector, PDO::PARAM_STR);
    $stmt->bindParam(':nuevoCorreo', $nuevoCorreo, PDO::PARAM_STR);
    $stmt->bindParam(':nuevoTelefono', $nuevoTelefono, PDO::PARAM_STR);
    $stmt->bindParam(':nuevoStatus', $nuevoStatus, PDO::PARAM_INT);
    $stmt->execute();
}
?>
