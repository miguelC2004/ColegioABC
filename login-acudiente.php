<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "colegioABC";
	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Error de conexión: " . $conn->connect_error);
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$correo = $_POST["correo"];
		$contrasena = $_POST["contrasena"];

		$sql = "SELECT * FROM acudientes WHERE correo = '$correo' AND contrasena = '$contrasena'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			session_start();
			$_SESSION["acudiente"] = $correo;
			header("Location:acudiente-inicio.php");
		} else {
			echo "<p>Correo electrónico o contraseña incorrectos.</p>";
		}
	}


	$conn->close();
	?>