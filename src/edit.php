<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Zoo</title>
</head>
<body>
<div>
	<header>
		<h1>Zoo</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación datos animal</h2>


<?php


/*Obtiene el id del registro del empleado a modificar, idempleado, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del empleado a modificar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
$idfoca = $_GET['idfoca'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$idfoca = $mysqli->real_escape_string($idfoca);


//Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT nombre, edad, peso ,habitat ,fecha_registro , especie FROM focas WHERE id = $idfoca");

//Se extrae el registro y lo guarda en el array $fila
//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
$fila = $resultado->fetch_array();
$habitat = $fila['habitat'];
$name = $fila['nombre'];
$age = $fila['edad'];
$especie = $fila['especie'];

//Se cierra la conexión de base de datos
$mysqli->close();
?>

<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a la página (form action="edit_action.php"): edit_action.php
-->

	<form action="edit_action.php" method="post">
		<div>
			<label for="name">Nombre</label>
			<input type="text" name="name" id="name" value="<?php echo $nombre;?>" required>
		</div>

		<div>
                        <label for="peso">Peso</label>
                        <input type="number" name="peso" id="peso" placeholder="peso" required>
                </div>

		<div>
			<label for="age">Edad</label>
			<input type="number" name="age" id="age" value="<?php echo $edad;?>" required>
		</div>

		<div>
                        <label for="Habitat">Habitat</label>
                        <select name="Habitat" id="Habitat" placeholder="Habitat" required>
                                <option value="" disabled selected>Seleccione un habitat</option>
                                <option value="Atlantico">Oceano Atlantico</option>
                                <option value="Mar del Norte">Mar del norte</option>
                                <option value="Pafico Norte">Pacifico Norte</option>
                                <option value="Antartida">Antartida</option>
                                <option value="Mediterraneo">Mediterraneo</option>
                                <option value="Artico">Artico</option>
				<option value="Mar Baltico">Mar Baltico</option>
                                <option value="Atlantico Norte">Atlantico Norte</option>
                                <option value="Costa de California">Costa de California</option>
		     		<option value="Oceano Antartico">Oceano Antartico</option>
</select>
                </div>

 		<div>
			<label for="Especie">Especie</label>
			<select name="Especie" id="Especie" placeholder="raza" required>
				<option value="" disabled selected>Seleccione una especie</option>
				<option value="Foca monje">Monje</option>
				<option value="Foca gris">Gris</option>
				<option value="Foca comun">Comun</option>
				<option value="Foca leopardo">Leopardo</option>
				<option value="Foca barbuda">Barbuda</option>
				<option value="Foca anillada">Anillada</option>
			</select>
		</div>

		<div >
			<input type="hidden" name="id_foca" value=<?php echo $id_foca;?>>
			<input type="submit" name="modifica" value="Guardar">
			<input type="button" value="Cancelar" onclick="location.href='index.php'">
		</div>
	</form>
	</main>
	<footer>
		Created by the IES Miguel Herrero team &copy; 2024
  	</footer>
</div>
</body>
</html>

