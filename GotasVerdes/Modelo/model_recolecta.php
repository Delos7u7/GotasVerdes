<?php
 class recolecta{
    public function InsertRecolecta($pdo,$nom_rec, $can_rec, $dir_rec, $status, $id_usuario){
        $stmt = $pdo->prepare("CALL InsertRecolecta(?, ?, ?, ? , ?)");
        $stmt->bindParam(1, $nom_rec, PDO::PARAM_STR);
        $stmt->bindParam(2, $can_rec, PDO::PARAM_STR);
        $stmt->bindParam(3, $dir_rec, PDO::PARAM_STR); 
        $stmt->bindParam(4, $status, PDO::PARAM_STR);
        $stmt->bindParam(5, $id_usuario, PDO::PARAM_STR);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
 }
?>