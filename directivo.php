<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Estudiantes</title>
    <link rel="stylesheet" type="text/css" href="ditectivo.css">

</head>
<body>
    <center>
    <h1>¡¡Bienvenidos, rectores y coordinadores!!</h1>
    EN SU SESION, PODRÁN CALIFICAR Y CONSULTAR INFORMACIÓN SOBRE TUS APRECIADOS ESTUDIANTES!!
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
<form method="post">
	<label>Ingrese el ID del Docente:</label><br>
	<input type="text" name="docente_id"><br>
	<input type="submit" value="Buscar">
</form>

<?php
	$conn = new mysqli('localhost', 'root', '', 'colegioABC');

	if ($conn->connect_error) {
		die("Error de conexión: " . $conn->connect_error);
	}

	if (isset($_POST['docente_id'])) {
		$docente_id = $_POST['docente_id'];

		$sql = "SELECT * FROM profesores WHERE id = '$docente_id'";
		$resultado = $conn->query($sql);

		if ($resultado->num_rows > 0) {
			$docente = $resultado->fetch_assoc();
			echo "<h2>Datos del Docente</h2>";
			echo "<p>ID: " . $docente['id'] . "</p>";
			echo "<p>Nombre: " . $docente['nombre'] . "</p>";
			echo "<p>Apellido: " . $docente['apellido'] . "</p>";
			echo "<p>Edad: " . $docente['edad'] . "</p>";
            echo "<p>Correo: " . $docente['correo'] . "</p>";
			echo "<p>Teléfono: " . $docente['telefono'] . "</p>";
		} else {
			echo "<p>No se encontró al docente con el ID ingresado.</p>";
		}
	}

	$conn->close();
?>

<h2>Registro de Estudiantes</h2>

	<?php
		if (isset($_POST['submit'])) {
			$conn = new mysqli('localhost', 'root', '', 'colegioABC');

			if ($conn->connect_error) {
				die("Error de conexión: " . $conn->connect_error);
			}

			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$edad = $_POST['edad'];
			$direccion = $_POST['direccion'];
			$correo = $_POST['correo'];
			$telefono = $_POST['telefono'];

			$sql = "INSERT INTO estudiantes (id, nombre, apellido, edad, direccion, correo, telefono) VALUES ('$id', '$nombre', '$apellido', '$edad', '$direccion', '$correo', '$telefono')";
			if ($conn->query($sql) === TRUE) {
				echo "<p>El estudiante ha sido registrado correctamente.</p>";
			} else {
				echo "<p>Error al registrar el estudiante: " . $conn->error . "</p>";
			}

			$conn->close();
		}
	?>

	<form method="post">
		<label>ID:</label><br>
		<input type="text" name="id"><br>
		<label>Nombre:</label><br>
		<input type="text" name="nombre"><br>
		<label>Apellido:</label><br>
		<input type="text" name="apellido"><br>
		<label>Edad:</label><br>
		<input type="number" name="edad"><br>
		<label>Dirección:</label><br>
		<input type="text" name="direccion"><br>
		<label>Correo:</label><br>
		<input type="email" name="correo"><br>
		<label>Teléfono:</label><br>
		<input type="text" name="telefono"><br>
		<input type="submit" name="submit" value="Registrar">
	</form>

    <h1>Registro de Profesores</h1>
	<form method="post">
		<label>ID:</label><br>
		<input type="text" name="id"><br>
		<label>Nombre:</label><br>
		<input type="text" name="nombre"><br>
		<label>Apellido:</label><br>
		<input type="text" name="apellido"><br>
		<label>Edad:</label><br>
		<input type="text" name="edad"><br>
		<label>Correo:</label><br>
		<input type="text" name="correo"><br>
		<label>Teléfono:</label><br>
		<input type="text" name="telefono"><br>
		<label>Materia:</label><br>
		<input type="text" name="materia"><br>
		<input type="submit" value="Registrar">
	</form>

	<?php
		$conn = new mysqli('localhost', 'root', '', 'colegioABC');

		if ($conn->connect_error) {
			die("Error de conexión: " . $conn->connect_error);
		}

		if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['edad']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['materia'])) {
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];
			$edad = $_POST['edad'];
			$correo = $_POST['correo'];
			$telefono = $_POST['telefono'];
			$materia = $_POST['materia'];

			$sql = "INSERT INTO profesores (id, nombre, apellido, edad, correo, telefono, materia) VALUES ('$id', '$nombre', '$apellido', '$edad', '$correo', '$telefono', '$materia')";

			if ($conn->query($sql) === TRUE) {
				echo "<p>Profesor registrado correctamente.</p>";
			} else {
				echo "<p>Error al registrar al profesor: " . $conn->error . "</p>";
			}
		}

		$conn->close();
	?>


<h2>Consulta de Profesores</h2>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<label for="nombre">Nombre:</label>
		<input type="text" id="nombre" name="nombre"><br><br>
		<label for="apellido">Apellido:</label>
		<input type="text" id="apellido" name="apellido"><br><br>
		<input type="submit" name="submit" value="Buscar">
	</form>
	<br>

	<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "colegioABC";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		if(isset($_POST['submit'])) {
			$nombre = $_POST['nombre'];
			$apellido = $_POST['apellido'];

			$sql = "SELECT * FROM profesores WHERE nombre LIKE '%$nombre%' AND apellido LIKE '%$apellido%'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo "<table border='1'>
						<tr>
							<th>ID</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Edad</th>
							<th>Correo</th>
							<th>Teléfono</th>
							<th>Materia</th>
						</tr>";

				while($row = $result->fetch_assoc()) {
					echo "<tr>
							<td>" . $row["id"] . "</td>
							<td>" . $row["nombre"] . "</td>
							<td>" . $row["apellido"] . "</td>
							<td>" . $row["edad"] . "</td>
							<td>" . $row["correo"] . "</td>
							<td>" . $row["telefono"] . "</td>
							<td>" . $row["materia"] . "</td>
						</tr>";
				}
				echo "</table>";
			} else {
				echo "No se encontraron resultados.";
			}

			$conn->close();
		}
	?>
<h1>Eliminar profesor</h1>
	<form method="post">
		<label>ID del profesor:</label>
		<input type="text" name="id"><br><br>
		<input type="submit" name="submit" value="Eliminar">
	</form>

	<?php
		$host = "localhost";
		$user = "root";
		$password = "";
		$dbname = "colegioABC";

		$conn = mysqli_connect($host, $user, $password, $dbname);

		if (!$conn) {
			die("La conexión ha fallado: " . mysqli_connect_error());
		}

		if (isset($_POST['submit'])) {
			$id = $_POST['id'];

			$sql = "DELETE FROM profesores WHERE id=$id";

			if (mysqli_query($conn, $sql)) {
				echo "El registro ha sido eliminado correctamente.";
			} else {
				echo "Ha habido un error al intentar eliminar el registro: " . mysqli_error($conn);
			}
		}

		mysqli_close($conn);
	?>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "colegioABC";
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		
		if ($conn->connect_error) {
			die("Error de conexión: " . $conn->connect_error);
		}
		
		$sql = "DELETE FROM estudiantes WHERE id='$id'";
		
		if ($conn->query($sql) === TRUE) {
			echo "Se eliminó el estudiante con éxito";
		} else {
			echo "Error al eliminar el estudiante: " . $conn->error;
		}
		
		$conn->close();
	}
	?>
</center>
<h2>Registro de Acudientes</h2>

<?php
	if (isset($_POST['submit_acudiente'])) {
		$conn = new mysqli('localhost', 'root', '', 'colegioABC');

		if ($conn->connect_error) {
			die("Error de conexión: " . $conn->connect_error);
		}

		$id_acudiente = $_POST['id'];
		$nombre_acudiente = $_POST['nombre'];
		$apellido_acudiente = $_POST['apellido'];
		$edad_acudiente = $_POST['edad'];
		$direccion = $_POST['direccion'];
		$correo_acudiente = $_POST['correo'];
		$telefono_acudiente = $_POST['telefono'];
		$contrasena = $_POST['contrasena'];
		$estudiante_id = isset($_POST['estudiante_id']) ? $_POST['estudiante_id'] : null;

		$sql = "INSERT INTO acudientes (id, nombre, apellido, edad, direccion, correo, telefono, contrasena, estudiante_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("isssiisss", $id_acudiente, $nombre_acudiente, $apellido_acudiente, $edad_acudiente, $direccion, $correo_acudiente, $telefono_acudiente, $contrasena, $estudiante_id);
		if ($stmt->execute()) {
			echo "<p>El acudiente ha sido registrado correctamente.</p>";
		} else {
			echo "<p>Error al registrar el acudiente: " . $conn->error . "</p>";
		}

		$stmt->close();
		$conn->close();
	}
?>
<form method="post">
    <label>ID:</label><br>
    <input type="text" name="id"><br>
    <label>Nombre:</label><br>
    <input type="text" name="nombre"><br>
    <label>Apellido:</label><br>
    <input type="text" name="apellido"><br>
    <label>Edad:</label><br>
    <input type="number" name="edad"><br>
    <label>Dirección:</label><br>
    <input type="text" name="direccion"><br>
    <label>Correo:</label><br>
    <input type="email" name="correo"><br>
    <label>Teléfono:</label><br>
    <input type="text" name="telefono"><br>
    <label>Contraseña:</label><br>
    <input type="password" name="contrasena"><br>
    <label>ID del estudiante:</label><br>
    <input type="number" name="estudiante_id"><br><br>
    <input type="submit" name="submit_acudiente" value="Registrar Acudiente">
</form>

<form action="cerrar_sesion.php">
    <input type="submit" value="Cerrar sesión">
</form>


</body>
</html>