<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Estudiantes</title>
	<link rel="stylesheet" type="text/css" href="ditectivo.css">

</head>
<body>
    <h1>bienvenido, señor docente!!</h1>
    EN TU SESION, PODRAS CALIFICAR Y CONSULTAR INFORMACION SOBRE TUS APRECIADOS ESTUDIANTES!!
	<h2>Consulta de Estudiantes</h2>
	<form method="post">
		<label>Ingrese el ID del Estudiante:</label><br>
		<input type="text" name="estudiante_id"><br>
		<input type="submit" value="Buscar">
	</form>

	<?php
		$conn = new mysqli('localhost', 'root', '', 'colegioABC');

		if ($conn->connect_error) {
			die("Error de conexión: " . $conn->connect_error);
		}

		if (isset($_POST['estudiante_id'])) {
			$estudiante_id = $_POST['estudiante_id'];

			$sql = "SELECT * FROM estudiantes WHERE id = '$estudiante_id'";
			$resultado = $conn->query($sql);

			if ($resultado->num_rows > 0) {
				$estudiante = $resultado->fetch_assoc();
				echo "<h2>Datos del Estudiante</h2>";
				echo "<p>ID: " . $estudiante['id'] . "</p>";
				echo "<p>Nombre: " . $estudiante['nombre'] . "</p>";
				echo "<p>Apellido: " . $estudiante['apellido'] . "</p>";
				echo "<p>Edad: " . $estudiante['edad'] . "</p>";
				echo "<p>Dirección: " . $estudiante['direccion'] . "</p>";
				echo "<p>Correo: " . $estudiante['correo'] . "</p>";
				echo "<p>Teléfono: " . $estudiante['telefono'] . "</p>";
			} else {
				echo "<p>No se encontró al estudiante con el ID ingresado.</p>";
			}
		}

		$conn->close();
	?>
    <h2>Calificación de Estudiantes</h2>
	<form method="post">
		<label>Ingrese el ID del Estudiante:</label><br>
		<input type="text" name="estudiante_id"><br>
		<label>Ingrese la materia:</label><br>
		<input type="text" name="materia"><br>
		<label>Ingrese la calificación:</label><br>
		<input type="number" name="calificacion" min="0" max="100"><br>
		<input type="submit" value="Calificar">
	</form>

    <?php
		$conn = new mysqli('localhost', 'root', '', 'colegioABC');

		if ($conn->connect_error) {
			die("Error de conexión: " . $conn->connect_error);
		}

		if (isset($_POST['estudiante_id']) && isset($_POST['materia']) && isset($_POST['calificacion'])) {
			$estudiante_id = $_POST['estudiante_id'];
			$materia = $_POST['materia'];
			$calificacion = $_POST['calificacion'];
			$id_profesor = 1; 
            $sql = "INSERT INTO calificaciones (estudiante_id, materia, calificacion, id_profesor) VALUES ('$estudiante_id', '$materia', '$calificacion', '$id_profesor')";
            if ($conn->query($sql) === TRUE) {
                echo "Calificación registrada con éxito.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
		$conn->close();
	?>

<h2>Consulta de Calificaciones</h2>
	<form method="post">
		<label>ID de la Calificación:</label><br>
		<input type="text" name="id_calificacion"><br>
		<label>ID del Estudiante:</label><br>
		<input type="text" name="estudiante_id"><br>
		<label>Materia:</label><br>
		<input type="text" name="materia"><br>
		<label>valor:</label><br>
		<input type="text" name="calificacion"><br>
		<label>ID del Profesor:</label><br>
		<input type="text" name="id_profesor"><br>
        <br>
		<input type="submit" value="Buscar">
	</form>

	<?php
		$conn = new mysqli('localhost', 'root', '', 'colegioABC');

		if ($conn->connect_error) {
			die("Error de conexión: " . $conn->connect_error);
		}

		if (isset($_POST['id_calificacion'])) {
			$id_calificacion = $_POST['id_calificacion'];

			$sql = "SELECT * FROM calificaciones WHERE id = '$id_calificacion'";
			$resultado = $conn->query($sql);

			if ($resultado->num_rows > 0) {
				$calificacion = $resultado->fetch_assoc();
				echo "<h2>Información de la Calificación</h2>";
				echo "<p>ID de la Calificación: " . $calificacion['id'] . "</p>";
				echo "<p>ID del Estudiante: " . $calificacion['estudiante_id'] . "</p>";
				echo "<p>Materia: " . $calificacion['materia'] . "</p>";
				echo "<p>Calificación: " . $calificacion['calificacion'] . "</p>";
				echo "<p>ID del Profesor: " . $calificacion['id_profesor'] . "</p>";
			} else {
				echo "<p>No se encontró la calificación con el ID indicado.</p>";
			}
		}

		$conn->close();
	?>

<form action="cerrar_sesion.php">
    <input type="submit" value="Cerrar sesión">
</form>
</body>
</html>
