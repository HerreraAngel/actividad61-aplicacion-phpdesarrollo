<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
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
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $especie = $_POST['especie'];
    $habitat = $_POST['habitat'];

    // Incluir conexión
    include_once("config.php");

    // Insertar datos en la tabla focas
    $resultado = mysqli_query($conexion, "INSERT INTO focas (nombre, edad, peso, especie, habitat) 
                                          VALUES ('$nombre', '$edad', '$peso', '$especie', '$habitat')");

    if ($resultado) {
        echo "<p>Foca agregada correctamente.</p>";
    } else {
        echo "<p>Error al agregar foca: " . mysqli_error($conexion) . "</p>";
    }
}
?>

    <p><a href='index.php'>Volver a la página principal</a></p>
    </main>
</div>
</body>
</html>
