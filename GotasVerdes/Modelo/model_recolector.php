<?php
class Recolector {
    public function verificarExistenciaCorreo($pdo, $cor_recolector) {
        $verificarCorreoStmt = $pdo->prepare("CALL BuscarRecolectorPorCorreo(?)");
        $verificarCorreoStmt->bindParam(1, $cor_recolector, PDO::PARAM_STR);
        $verificarCorreoStmt->execute();
        $correoExistente = $verificarCorreoStmt->fetchColumn();
        $verificarCorreoStmt->closeCursor();  
        return $correoExistente;
    }
    public function verificarExistenciaCorreoo($pdo, $cor_recolector) {
        $verificarCorreoStmt = $pdo->prepare("CALL BuscarPorCorreoUsuario(?)");
        $verificarCorreoStmt->bindParam(1, $cor_recolector, PDO::PARAM_STR);
        $verificarCorreoStmt->execute();
        $correoExistenteU = $verificarCorreoStmt->fetchColumn();
        $verificarCorreoStmt->closeCursor(); 
        return $correoExistenteU > 0;
    }
    
    public function verificarExistenciaTelefono($pdo, $tel_recolector) {
        $verificarTelefonoStmt = $pdo->prepare("CALL BuscarRecolectorPorTelefono(?)");
        $verificarTelefonoStmt->bindParam(1, $tel_recolector, PDO::PARAM_STR);
        $verificarTelefonoStmt->execute();
        $telefonoExistente = $verificarTelefonoStmt->fetchColumn();
        $verificarTelefonoStmt->closeCursor();
        return $telefonoExistente;
    }

    public function insertarRecolector($pdo, $nom_recolector, $eda_recolector, $ruta_cedula, $ruta_licencia, $cor_recolector, $tel_recolector, $pas_recolector, $sta_recolector) {
        $stmt = $pdo->prepare("CALL InsertarRecolector(?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $nom_recolector, PDO::PARAM_STR);
        $stmt->bindParam(2, $eda_recolector, PDO::PARAM_STR);
        $stmt->bindParam(3, $ruta_cedula, PDO::PARAM_STR); 
        $stmt->bindParam(4, $ruta_licencia, PDO::PARAM_STR);
        $stmt->bindParam(5, $cor_recolector, PDO::PARAM_STR);
        $stmt->bindParam(6, $tel_recolector, PDO::PARAM_STR);
        $stmt->bindParam(7, $pas_recolector, PDO::PARAM_STR);
        $stmt->bindParam(8, $sta_recolector, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
