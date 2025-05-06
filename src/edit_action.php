<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Edición</title>
</head>
<body>
    <header>
        <h1>Resultado de la Edición</h1>
    </header>
    <main>
<?php
if (isset($_POST['modifica'])) {
    $foca_id = $_POST['foca_id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $especie = $_POST['especie'];
    $habitat = $_POST['habitat'];

    // Actualización en la base de datos
    $sql = "UPDATE focas 
            SET nombre = ?, edad = ?, peso = ?, especie = ?, habitat = ? 
            WHERE foca_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sidssi", $nombre, $edad, $peso, $especie, $habitat, $foca_id);

    if ($stmt->execute()) {
        echo "<p>✅ Foca actualizada correctamente.</p>";
    } else {
        echo "<p>❌ Error al actualizar foca: " . $stmt->error . "</p>";
    }

    $stmt->close();
}
?>
        <p><a href="index.php">Volver al inicio</a></p>
    </main>
</body>
</html>
