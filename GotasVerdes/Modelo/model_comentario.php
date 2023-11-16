<?php


class Comentario {

    public function Comentar($pdo,$comentario,$telefono,$correo) {
        $stmt = $pdo->prepare("call InsertarComentario(?, ?, ?)");
        $stmt->bindParam(1, $comentario, PDO::PARAM_STR);
        $stmt->bindParam(2, $telefono, PDO::PARAM_STR);
        $stmt->bindParam(3, $correo, PDO::PARAM_STR);
        

        try {
            if ($stmt->execute()) {
                return true; // Devuelve true en caso de éxito
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
                return false; // Devuelve false en caso de error
            }
        } catch (PDOException $e) {
            echo "Error de PDO: " . $e->getMessage();
        }
    }
}


?>
