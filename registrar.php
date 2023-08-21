<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colegioabc";

$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobamos si la conexión fue exitosa
if ($conn->connect_error) {
	die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST["nombre"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$sql = "INSERT INTO aspirantes (nombre, fecha_nacimiento, direccion, telefono, correo) VALUES ('$nombre', '$fecha_nacimiento', '$direccion', '$telefono', '$correo')";

if ($conn->query($sql) === TRUE) {
	$to = "CEIABC@HOTMAIL.COM";
	$subject = "Nuevo aspirante registrado";
	$message = "Este es un correo de prueba de la página del ex alumno miguel cataño. Se ha registrado un nuevo aspirante con los siguientes datos:\n\nNombre: $nombre\nFecha de nacimiento: $fecha_nacimiento\nDirección: $direccion\nTeléfono: $telefono\nCorreo electrónico: $correo";
	$headers = "From: $correo";

	mail($to, $subject, $message, $headers);

	echo "Registro exitoso.";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
