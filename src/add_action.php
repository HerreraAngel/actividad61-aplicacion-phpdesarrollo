<?php
// Incluir el archivo de configuración para la conexión a la base de datos
include_once("config.php");

// Mostrar errores para depuración (opcional, puede deshabilitarse en producción)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar que la conexión se haya establecido correctamente
if ($mysqli->connect_error) {
    die("Error de conexión a la base de datos: " . $mysqli->connect_error);
}

// Verificar si el formulario ha sido enviado
if (isset($_POST['inserta'])) {
    // Obtener los datos del formulario
    $codigo_animal = $_POST['codigo_animal'];
    $nombre = $_POST['name'];
    $edad = $_POST['age'];
    $peso = $_POST['peso'];
    $especie = $_POST['Especie'];
    $habitat = $_POST['Habitat'];

    // Validar que el código de animal tenga el formato '8 dígitos + 1 letra'
    if (!preg_match('/^\d{8}[A-Za-z]$/', $codigo_animal)) {
        echo "<p>Error: El código del animal debe seguir el formato 8 dígitos seguidos de una letra.</p>";
        exit;
    }

    // Verificar que los demás campos no estén vacíos
    if (!empty($nombre) && !empty($edad) && !empty($peso) && !empty($especie) && !empty($habitat)) {
        // Crear la consulta SQL preparada
        $stmt = $mysqli->prepare("INSERT INTO focas (codigo_animal, nombre, edad, peso, especie, habitat) VALUES (?, ?, ?, ?, ?, ?)");

        // Verificar si la preparación de la consulta fue exitosa
        if (!$stmt) {
            die("Error al preparar la consulta: " . $mysqli->error);
        }

        // Asociar los parámetros con los valores
        $stmt->bind_param("ssidss", $codigo_animal, $nombre, $edad, $peso, $especie, $habitat); // s = string, i = integer, d = double

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Redirigir al usuario a la página principal después de insertar
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

