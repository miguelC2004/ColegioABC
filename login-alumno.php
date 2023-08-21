<?php
		$host = 'localhost';
		$usuario = 'root';
		$password = '';
		$bd = 'colegioABC';

		$conexion = mysqli_connect($host, $usuario, $contraseña, $bd);

		if(!$conexion){
			die('Error de conexión: ' . mysqli_connect_error());
		}

		if(isset($_SESSION['id_estudiante'])){
			header('Location: pagina_de_inicio.php');
			exit();
		}

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$correo = $_POST['correo'];
			$id = $_POST['contraseña'];

			// Verificación del correo y la contraseña en la base de datos
			$sql = "SELECT * FROM estudiantes WHERE correo = '$correo' AND id = '$id'";
			$resultado = mysqli_query($conexion, $sql);

			if(mysqli_num_rows($resultado) > 0){
				$estudiante = mysqli_fetch_assoc($resultado);

				// Inicio de sesión
				session_start();
				$_SESSION['id_estudiante'] = $estudiante['id'];
				header('Location: inicio-alumno.php');
				exit();
			} else {
				echo "Correo electrónico o contraseña incorrectos.";
			}
		}

		mysqli_close($conexion);
	?>