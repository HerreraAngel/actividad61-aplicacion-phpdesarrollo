<?php
// Conexión a la base de datos
include_once("config.php");

// Obtener datos de la base
$result = mysqli_query($mysqli, "SELECT * FROM focas ORDER BY foca_id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Rincón de las Focas</title>
</head>
<body>
    <header>
        <h1>El Rincón de las Focas</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="add.html">Añadir Animales</a></li>
        </ul>
    </nav>

    <main>
        <table border="1" cellpadding="10">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código Animal</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Peso (kg)</th>
                    <th>Especie</th>
                    <th>Hábitat</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($res = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?= $res['foca_id'] ?></td>
                    <td><?= $res['codigo_animal'] ?? 'N/A' ?></td>
                    <td><?= $res['nombre'] ?></td>
                    <td><?= $res['edad'] ?></td>
                    <td><?= $res['peso'] ?></td>
                    <td><?= $res['especie'] ?></td>
                    <td><?= $res['habitat'] ?></td>
                    <td><?= $res['fecha_registro'] ?></td>
                    <td>
                        <a href="edit.php?id=<?= $res['foca_id'] ?>">Editar</a> |
                        <a href="delete.php?id=<?= $res['foca_id'] ?>" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </main>
</body>
</html>

</div>
</body>
</html>
