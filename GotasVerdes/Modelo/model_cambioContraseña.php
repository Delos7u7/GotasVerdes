<?php
class Usuario {
    public function cambiarContrasena($pdo, $gmail, $pass1) {
        $stmt = $pdo->prepare("CALL cambiarCon(:correo, :nueva)");
        $stmt->bindParam(':correo', $gmail);
        $stmt->bindParam(':nueva', $pass1);
        $stmt->execute();
    }
}
?>