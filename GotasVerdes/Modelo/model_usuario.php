<?php
class Usuario {
    public function verificarExistenciaNombre($pdo, $nom_usu) {
        $verificarNombreStmt = $pdo->prepare("CALL BuscarPorNombreUsuario(?)");
        $verificarNombreStmt->bindParam(1, $nom_usu, PDO::PARAM_STR);
        $verificarNombreStmt->execute();
        $nombreExistente = $verificarNombreStmt->fetchColumn();
        $verificarNombreStmt->closeCursor(); 
        return $nombreExistente > 0;
    }
    public function verificarExistenciaCorreo($pdo, $cor_usu) {
        $verificarCorreoStmt = $pdo->prepare("CALL BuscarPorCorreoUsuario(?)");
        $verificarCorreoStmt->bindParam(1, $cor_usu, PDO::PARAM_STR);
        $verificarCorreoStmt->execute();
        $correoExistente = $verificarCorreoStmt->fetchColumn();
        $verificarCorreoStmt->closeCursor(); 
        return $correoExistente > 0;
    }
    public function verificarExistenciaCorreoR($pdo, $cor_usu) {
        $verificarCorreoStmt = $pdo->prepare("CALL BuscarRecolectorPorCorreo(?)");
        $verificarCorreoStmt->bindParam(1, $cor_usu, PDO::PARAM_STR);
        $verificarCorreoStmt->execute();
        $correoExistenteR = $verificarCorreoStmt->fetchColumn();
        $verificarCorreoStmt->closeCursor(); 
        return $correoExistenteR > 0;
    }
    public function verificarExistenciaTelefono($pdo, $tel_usu) {
        $verificarTelefonoStmt = $pdo->prepare("CALL BuscarPorTelefonoUsuario(?)");
        $verificarTelefonoStmt->bindParam(1, $tel_usu, PDO::PARAM_STR);
        $verificarTelefonoStmt->execute();
        $telefonoExistente = $verificarTelefonoStmt->fetchColumn();
        $verificarTelefonoStmt->closeCursor(); 
        return $telefonoExistente > 0;
    }
    public function insertarUsuario($pdo, $nom_usu, $cor_usu, $tel_usu, $con_usu, $pun_usu) {
        $stmt = $pdo->prepare("CALL InsertarUsuario(?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $nom_usu, PDO::PARAM_STR);
        $stmt->bindParam(2, $cor_usu, PDO::PARAM_STR);
        $stmt->bindParam(3, $tel_usu, PDO::PARAM_STR); 
        $stmt->bindParam(4, $con_usu, PDO::PARAM_STR);
        $stmt->bindParam(5, $pun_usu, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>