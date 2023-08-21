<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioabc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
}

$correo = $_POST["correo"];
$contrasena = $_POST["contrasena"];

$sql = "SELECT * FROM profesores WHERE correo='$correo' AND contrasena='$contrasena'";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
	session_start();
	$_SESSION["correo"] = $correo;
	header("Location: inicio-docente.php");
	exit();
} else {
	echo "Correo o contraseña incorrectos.";
}

$conn->close();
?>
