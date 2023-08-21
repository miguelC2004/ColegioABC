<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="ditectivo.css">

    <title>sesión de acudiente</title>
</head>
<body>
    <center>
    <h1>BIENVENIDO A SU SESIÓN, SEÑOR PADRE DE FAMILIA!!</h1>
AQUÍ PODRÁ CONSULTAR Y LLEVAR SEGUIMIENTO DEL RENDIMIENTO ACADÉMICO DEL ALUMNO A SU CARGO

<Br>
<br>
    <h2>Consulte las calificaciones del alumno</h2>
    <?php if(isset($_POST['submit'])): ?>
      <?php if(!empty($calificaciones)): ?>
        <table>
          <thead>
            <tr>
              <th>Materia</th>
              <th>Calificación</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($calificaciones as $calificacion): ?>
              <tr>
                <td><?php echo $calificacion['materia']; ?></td>
                <td><?php echo $calificacion['calificacion']; ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php else: ?>
        <p>No se encontraron calificaciones para el estudiante.</p>
      <?php endif; ?>
    <?php else: ?>
      <form method="POST" action="">
        <label>ID del estudiante:</label>
        <input type="text" name="id_estudiante" required>
        <br>
        <input type="submit" name="submit" value="Consultar calificaciones">
      </form>
    <?php endif; ?>
<h2> En caso de desear cancelar la matrícula de su hijo, escriba los datos del menor y sus registros serán eliminados de inmediato:</h2>

<h2>Eliminar registro de estudiante</h2>
    <form method="post">
      <label for="id_estudiante">ID del estudiante:</label>
      <input type="number" id="id_estudiante" name="id_estudiante" required>
      <br>
      <label for="confirmacion">Confirmación:</label>
      <input type="checkbox" id="confirmacion" name="confirmacion" required>
      <br>
      <input type="submit" value="Eliminar">
    </form>
    <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_estudiante = $_POST['id_estudiante'];
        $confirmacion = $_POST['confirmacion'];
        if ($confirmacion == 'on') {
          $servername = "localhost";
          $username = "tu_usuario";
          $password = "tu_contraseña";
          $dbname = "tu_base_de_datos";
          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
          }
          $sql = "DELETE FROM acudientes WHERE estudiante_id = $id_estudiante";
          if ($conn->query($sql) === TRUE) {
            echo "Registro eliminado correctamente";
          } else {
            echo "Error al eliminar el registro: " . $conn->error;
          }
          $conn->close();
        } else {
          echo "Debe confirmar la eliminación del registro";
        }
      }
    ?>

</CENTER>
</body>
</html>