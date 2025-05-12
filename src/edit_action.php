<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de Edición</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <header>
        <h1 class="text-center">Resultado de la Edición</h1>
    </header>
    <main class="mt-4">
<?php
if (isset($_POST['modifica'])) {
    $foca_id = $_POST['foca_id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $especie = $_POST['especie'];
    $habitat = $_POST['habitat'];

    $sql = "UPDATE focas SET nombre = ?, edad = ?, peso = ?, especie = ?, habitat = ? WHERE foca_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sidssi", $nombre, $edad, $peso, $especie, $habitat, $foca_id);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success">✅ Foca actualizada correctamente.</div>';
    } else {
        echo '<div class="alert alert-danger">❌ Error al actualizar foca: ' . $stmt->error . '</div>';
    }
    $stmt->close();
}
?>
        <a href="index.php" class="btn btn-primary">Volver al inicio</a>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
