<?php
class Login
{
    public function BuscarRecolector($pdo, $user, $pass) {
        $verificarCorreoStmt = $pdo->prepare("CALL BuscarRecolector(?,?)");
        $verificarCorreoStmt->bindParam(1, $user, PDO::PARAM_STR);
        $verificarCorreoStmt->bindParam(2, $pass, PDO::PARAM_STR);
        $verificarCorreoStmt->execute();
        $verificarRecolector = $verificarCorreoStmt->fetchColumn();
        $verificarCorreoStmt->closeCursor();
        return $verificarRecolector;
    }
    public function BuscarUsuario($pdo, $user, $pass) {
        $verificarCorreoStmt = $pdo->prepare("CALL BuscarUsuario(?,?)");
        $verificarCorreoStmt->bindParam(1, $user, PDO::PARAM_STR);
        $verificarCorreoStmt->bindParam(2, $pass, PDO::PARAM_STR);
        $verificarCorreoStmt->execute();
        $verificarUsuario = $verificarCorreoStmt->fetchColumn();
        $verificarCorreoStmt->closeCursor();
        return $verificarUsuario;
    }
    public function BuscarAdministrador($pdo, $user, $pass) {
        $verificarCorreoStmt = $pdo->prepare("CALL BuscarAdministrador(?,?)");
        $verificarCorreoStmt->bindParam(1, $user, PDO::PARAM_STR);
        $verificarCorreoStmt->bindParam(2, $pass, PDO::PARAM_STR);
        $verificarCorreoStmt->execute();
        $verificarAdmin = $verificarCorreoStmt->fetchColumn();
        $verificarCorreoStmt->closeCursor();
        return $verificarAdmin;
    }
}
?>
