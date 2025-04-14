<?php
// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Foca</title>
</head>
<body>
<div>
    <header>
        <h1>Editar Información de Foca</h1>
    </header>
    <main>

<?php
if (isset($_POST['modifica'])) {
    // Obtener datos del formulario
    $foca_id = $_POST['foca_id'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $peso = $_POST['peso'];
    $especie = $_POST['especie'];
    $habitat = $_POST['habitat'];

    // Incluir conexión
    include_once("config.php");

    // Actualizar datos en la tabla focas
    $resultado = mysqli_query($conexion, "UPDATE focas 
                                          SET nombre='$nombre', edad='$edad', peso='$peso', especie='$especie', habitat='$habitat' 
                                          WHERE foca_id='$foca_id'");

    if ($resultado) {
        echo "<p>✅ Foca actualizada correctamente.</p>";
    } else {
        echo "<p>❌ Error al actualizar foca: " . mysqli_error($conexion) . "</p>";
    }
}
?>

    <p><a href='index.php'>Volver a la página principal</a></p>
    </main>
</div>
</body>
</html>

