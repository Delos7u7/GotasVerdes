<?php

function asignarRecolecta($pdo, $idRecolecta, $idRecolector) {
    try {
        $stmt = $pdo->prepare("CALL asignar_recolecta(:id_recolecta_param, :id_recolector_param)");
        $stmt->bindParam(':id_recolecta_param', $idRecolecta, PDO::PARAM_INT);
        $stmt->bindParam(':id_recolector_param', $idRecolector, PDO::PARAM_INT);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        throw $e;
    }
}

?>