<?php
function buscarUsuarioPorCorreo($pdo, $cor_recuperarUsuario)
{
    $verificarStmt = $pdo->prepare("CALL BuscarPorCorreoUsuario(?)");
    $verificarStmt->bindParam(1, $cor_recuperarUsuario, PDO::PARAM_STR);
    $verificarStmt->execute();
    $result = $verificarStmt->fetchAll();
    return $result;
}
function BuscarRecolectorPorCorreo($pdo, $cor_recuperarUsuario)
{
    $verificarStmt = $pdo->prepare("CALL BuscarRecolectorPorCorreo(?)");
    $verificarStmt->bindParam(1, $cor_recuperarUsuario, PDO::PARAM_STR);
    $verificarStmt->execute();
    $result1 = $verificarStmt->fetchAll();
    return $result1;
}

function InsertarRecuperarContrasena($pdo, $correo_recuperar, $token_recuperar, $codigo_recuperar)
{
    $stmt = $pdo->prepare("CALL InsertarRecuperarContraseña(?, ?, ?)");
    $stmt->bindParam(1, $correo_recuperar, PDO::PARAM_STR);
    $stmt->bindParam(2, $token_recuperar, PDO::PARAM_STR);
    $stmt->bindParam(3, $codigo_recuperar, PDO::PARAM_INT);

    if ($stmt->execute()) {
        return true;
    } else {
        return "Error al insertar el registro: " . implode(" ", $stmt->errorInfo());
    }
}
?>
