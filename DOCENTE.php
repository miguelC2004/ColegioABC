<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión</title>
</head>
<body>
	<h1>Iniciar sesión como profesor</h1>
	<form action="login_profesor.php" method="POST">
		<label for="correo">Correo electrónico:</label>
		<input type="email" id="correo" name="correo" required>
		<br>
		<label for="contrasena">Contraseña:</label>
		<input type="password" id="contrasena" name="contrasena" required>
		<br>
		<button type="submit">Iniciar sesión</button>
	</form>
</body>
</html>
