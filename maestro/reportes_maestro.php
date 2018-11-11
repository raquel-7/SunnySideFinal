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
  <center>
    <h2 class = "bienvenido__tutor">Reportes</h2>
  </center>
  <center>
      <a href="reporte_bimestral_maestro.php"><img src="../img/reporte_bimestral.png" width = "200px" height="200px" class="opcion"></a>
      <a href="reporte_diario_maestro.php"><img src="../img/reporte_diario.png" width = "200px" height="200px" class="opcion"></a>
  </center>
</body>
</html>
