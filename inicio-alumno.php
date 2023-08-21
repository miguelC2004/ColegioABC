<?php
$host = "localhost";
$dbname = "colegioABC";
$user = "root";
$password = "";

try {
  $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  die("Error al conectar: " . $e->getMessage());
}


if(isset($_POST['submit'])) {
  $id_estudiante = $_POST['id_estudiante'];

  $query = "SELECT materia, calificacion FROM calificaciones WHERE estudiante_id = :id_estudiante";
  $stmt = $db->prepare($query);
  $stmt->bindParam(":id_estudiante", $id_estudiante);
  $stmt->execute();
  $calificaciones = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>sesión estudiante</title>
    <link rel="stylesheet" type="text/css" href="ditectivo.css">

  </head>
  <body>
    <CENTER>
    <h1>BIENVENIDO A TU SESIÓN, MI APRECIADO ESTUDIANTE!!</h1>
    AQUÍ PODRÁS CONSULTAR TUS CALIFICACIONES PARA SABER COMO VAS CON TU PROMEDIO ACADÉMICO
TAMBIÉN APARECERÁ EL ID DE TU PROFESOR, POR SI NECESITASS CONSULTAR ALGO CON ÉL.
<Br>
<br>
    <h2>Consulta tus calificaciones</h2>
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
          </CENTER>
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

  </body>
</html>
