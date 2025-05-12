<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM focas ORDER BY foca_id DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Rincón de las Focas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-4">
    <header class="mb-4">
        <h1 class="text-center">El Rincón de las Focas</h1>
    </header>

    <nav class="mb-3">
        <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" href="index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="add.html">Añadir Animales</a></li>
        </ul>
    </nav>

    <main>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
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
                        <td><?= $res['codigo_animal'] ?? 'N/A' ?></td>
                        <td><?= $res['nombre'] ?></td>
                        <td><?= $res['edad'] ?></td>
                        <td><?= $res['peso'] ?></td>
                        <td><?= $res['especie'] ?></td>
                        <td><?= $res['habitat'] ?></td>
                        <td><?= $res['fecha_registro'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $res['foca_id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                            <a href="delete.php?id=<?= $res['foca_id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminarlo?')">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
