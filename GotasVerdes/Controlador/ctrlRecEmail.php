<?php
$idRecolector;
$stmt = $pdo->prepare("CALL ObtenerCorreoYNombre(:recolector_id)");
$stmt->bindParam(':recolector_id', $idRecolector, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);
$nombreRecolector = $result['nombre'];
$correoRecolector = $result['correo'];
$stmt->closeCursor();
?>