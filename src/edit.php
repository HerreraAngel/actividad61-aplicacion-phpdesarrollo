<?php
include_once("config.php");

$foca_id = $_GET['id'];
$foca_id = $mysqli->real_escape_string($foca_id);
$resultado = $mysqli->query("SELECT * FROM focas WHERE foca_id = $foca_id");
$fila = $resultado->fetch_assoc();

$nombre = $fila['nombre'];
$edad = $fila['edad'];
$peso = $fila['peso'];
$habitat = $fila['habitat'];
$especie = $fila['especie'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Foca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h1 class="text-center mb-4">Editar Foca</h1>
    <form action="edit_action.php" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="<?= $nombre ?>" required>
        </div>
        <div class="col-md-6">
            <label for="peso" class="form-label">Peso (kg)</label>
            <input type="number" name="peso" id="peso" class="form-control" step="0.01" value="<?= $peso ?>" required>
        </div>
        <div class="col-md-6">
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" id="edad" class="form-control" value="<?= $edad ?>" required>
        </div>
        <div class="col-md-6">
            <label for="habitat" class="form-label">Hábitat</label>
            <select name="habitat" id="habitat" class="form-select" required>
                <option value="" disabled>Seleccione un hábitat</option>
                <?php
                $habitats = [
                    "Atlántico", "Mar del Norte", "Pacífico Norte", "Antártida",
                    "Mediterráneo", "Ártico", "Mar Báltico", "Atlántico Norte",
                    "Costa de California", "Océano Antártico"
                ];
                foreach ($habitats as $h) {
                    $selected = ($h == $habitat) ? "selected" : "";
                    echo "<option value=\"$h\" $selected>$h</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-12">
            <label for="especie" class="form-label">Especie</label>
            <select name="especie" id="especie" class="form-select" required>
                <option value="" disabled>Seleccione una especie</option>
                <?php
                $especies = [
                    "Foca monje", "Foca gris", "Foca común",
                    "Foca leopardo", "Foca barbuda", "Foca anillada"
                ];
                foreach ($especies as $e) {
                    $selected = ($e == $especie) ? "selected" : "";
                    echo "<option value=\"$e\" $selected>$e</option>";
                }
                ?>
            </select>
        </div>
        <input type="hidden" name="foca_id" value="<?= $foca_id ?>">
        <div class="col-12">
            <button type="submit" name="modifica" class="btn btn-success">Guardar</button>
            <button type="button" class="btn btn-secondary" onclick="location.href='index.php'">Cancelar</button>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

