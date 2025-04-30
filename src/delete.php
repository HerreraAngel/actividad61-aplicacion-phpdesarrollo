<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");

// Recoge el id de la foca a eliminar
$idfoca = $_GET['idfoca'] ?? null;

if ($idfoca) {
    // Limpia el valor
    $idfoca = $mysqli->real_escape_string($idfoca);

    // Ejecuta el borrado
    $result = $mysqli->query("DELETE FROM focas WHERE foca_id = $idfoca");

    // Cierra la conexión
    $mysqli->close();
}

// Redirige de vuelta al index
header("Location: index.php");
exit;
?>

