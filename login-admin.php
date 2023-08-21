<?php

$conexion = new mysqli("localhost", "root", "", "colegioABC");

if(isset($_POST["correo"])) {
  $correo = $_POST["correo"];
} else {
  $correo = "";
}

$contrasena = $_POST["contrasena"];

$query = "SELECT * FROM directivos WHERE correo = '$correo' AND contrasena = '$contrasena'";
$resultado = $conexion->query($query);

if ($resultado->num_rows == 1) {
  session_start();
  $_SESSION["correo"] = $correo;
  $_SESSION["contrasena"] = $contrasena;
  header("Location: directivo.php");
} else {
  echo "Correo electrónico o contraseña incorrectos.";
}

$conexion->close();
?>
