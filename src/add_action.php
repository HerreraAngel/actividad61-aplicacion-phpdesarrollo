<?php
// Mostrar errores para depurar
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

    // Verificar que los datos no estén vacíos
    if (!empty($nombre) && !empty($edad) && !empty($peso) && !empty($especie) && !empty($habitat)) {
        // Crear una consulta SQL preparada
        $stmt = $conexion->prepare("INSERT INTO focas (nombre, edad, peso, especie, habitat) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdisi", $nombre, $edad, $peso, $especie, $habitat); // s = string, i = integer, d = double
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir a la página principal (index.php) después de la inserción
            header("Location: index.php");
            exit(); // Asegura que no se ejecute ningún código después de la redirección
        } else {
            echo "<p>Error al agregar foca: " . $stmt->error . "</p>";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "<p>Por favor, complete todos los campos.</p>";
    }
} else {
    echo "<p>No se ha enviado el formulario aún.</p>";
}
?>

    <p><a href='index.php'>Volver a la página principal</a></p>
    </main>
</div>
</body>
</html>

</div>
</body>
</html>

