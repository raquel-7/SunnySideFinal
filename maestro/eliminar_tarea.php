<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion (Archivo: modificar_reporteB.php).\n";
  exit;
}

?>
<html>
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="../css/estilos.css" rel="stylesheet">
<body>
  <?php
  include "header_maestro.php";
  ?>
  <?php

  $usuario = $_SESSION['usuario'];

  /***************************** NOMBRE GRUPO *********************************/
  $sql_grupo = "SELECT nombreg FROM maestro WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_grupo);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: modificar_tarea.php, grupo).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $nombreg = $row1['nombreg'];

  $sql_tareas = "SELECT * FROM tareas WHERE nombreg = '$nombreg'";
  $result2 = pg_query($dbconn, $sql_tareas);
  if (!$result2) {
    echo "Ocurrió un error con query (Archivo: modificar_tarea.php, tareas).\n";
    exit;
  }


  ?>
  <div >
    <center>
    <h2 class = "bienvenido__tutor">Tareas creadas</h2>
    </center>
  </div>
<div >
  <center>
  <table>
    <thead>
      <th>
        Fecha
      </th>
      <th>
        Curso
      </th>
      <th>
        Descripción
      </th>
      <th>
        Opciones
      </th>
    </thead>
    <tbody>
      <?php
          while ($row2 = pg_fetch_array($result2)) {
            $descripcion = $row2['descripcion'];
            $fecha = $row2['fecha'];
            $nombrec = $row2['nombrec'];
            $nombreg = $row2['nombreg'];
            $idcurso = $row2['idcurso'];
        ?>
      <tr>
        <td>
          <?php
            echo $fecha;
          ?>
        </td>
        <td>
          <?php
            echo $nombrec;
          ?>
        </td>
        <td>
          <?php
            echo $descripcion;
          ?>
        </td>
        <td><a href="eliminando_tarea.php?fecha=<?php echo base64_encode($fecha); ?>&nombrec=<?php echo base64_encode($nombrec); ?>&nombreg=<?php echo base64_encode($nombreg); ?>&descripcion=<?php echo base64_encode($descripcion); ?>&idcurso=<?php echo base64_encode($idcurso); ?>">Eliminar tarea</a></td>
      </tr>
      <?php
          }
        ?>
    </tbody>
    </table>
  </center>
</div>
</body>
</html>
