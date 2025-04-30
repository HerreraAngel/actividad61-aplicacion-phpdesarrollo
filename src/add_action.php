<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro de Focas</title>
</head>
<body>
<div>
    <header>
        <h1>El Rincón de las Focas</h1>
    </header>
    <main>

<?php
if (isset($_POST['inserta'])) {
    // Obtener datos del formulario
    $nombre = $_POST['name']; // Cambié 'nombre' por 'name' para que coincida con el formulario
    $edad = $_POST['age']; // Cambié 'edad' por 'age'
    $peso = $_POST['peso'];
    $especie = $_POST['Especie']; // Cambié 'especie' por 'Especie' para que coincida con el formulario
    $habitat = $_POST['Habitat']; // Cambié 'habitat' por 'Habitat'

    // Validar datos (puedes agregar más validaciones si lo necesitas)
    if (!empty($nombre) && !empty($edad) && !empty($peso) && !empty($especie) && !empty($habitat)) {
        // Crear una consulta SQL preparada
        $stmt = $conexion->prepare("INSERT INTO focas (nombre, edad, peso, especie, habitat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdisi", $nombre, $edad, $peso, $especie, $habitat); // s = string, i = integer, d = double
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<p>Foca agregada correctamente.</p>";
        } else {
            echo "<p>Error al agregar foca: " . $stmt->error . "</p>";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "<p>Por favor, complete todos los campos.</p>";
    }
}
?>

    <p><a href='index.php'>Volver a la página principal</a></p>
    </main>
</div>
</body>
</html>

