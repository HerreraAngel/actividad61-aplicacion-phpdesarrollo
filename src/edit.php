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
</head>
<body>
    <header>
        <h1>Editar Foca</h1>
    </header>
    <main>
        <form action="edit_action.php" method="post">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" value="<?= $nombre ?>" required>

            <label for="peso">Peso (kg)</label>
            <input type="number" name="peso" id="peso" step="0.01" value="<?= $peso ?>" required>

            <label for="edad">Edad</label>
            <input type="number" name="edad" id="edad" value="<?= $edad ?>" required>

            <label for="habitat">Hábitat</label>
            <select name="habitat" id="habitat" required>
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

            <label for="especie">Especie</label>
            <select name="especie" id="especie" required>
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

            <input type="hidden" name="foca_id" value="<?= $foca_id ?>">
            <input type="submit" name="modifica" value="Guardar">
            <input type="button" value="Cancelar" onclick="location.href='index.php'">
        </form>
    </main>
</body>
</html>
