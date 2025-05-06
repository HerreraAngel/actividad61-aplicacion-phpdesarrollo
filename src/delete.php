<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");

// Recoge el id de la foca a eliminar
$foca_id = $_GET['id'] ?? null;


$resultado = $mysqli->query("SELECT * FROM focas WHERE foca_id = $foca_id");

if ($foca_id) {
    // Limpia el valor
    $foca_id = $mysqli->real_escape_string($foca_id);

    // Ejecuta el borrado
    $result = $mysqli->query("DELETE FROM focas WHERE foca_id = $foca_id");

    // Cierra la conexión
    $mysqli->close();
}

// Redirige de vuelta al index
header("Location: index.php");
exit;
?>
