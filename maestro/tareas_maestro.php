<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: calendarizacion_maestro.php)\n";
  exit;
}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="../css/estilos.css" rel="stylesheet">
<body>
  <?php
  include "header_maestro.php";
  ?>
  <div>
  <center>
    <h2 class = "bienvenido__tutor">Tareas</h2>
  </center>
  <center>
      <a href="crear_tarea.php"><img src="../img/crear_tarea.png" width = "200px" height="200px" class="opcion"></a>
      <a href="modificar_tarea.php"><img src="../img/editar_tarea.png" width = "200px" height="200px" class="opcion"></a>
      <a href="eliminar_tarea.php"><img src="../img/eliminar_tarea.png" width = "200px" height="200px" class="opcion"></a>
  </center>
</div>

</body>
</html>
