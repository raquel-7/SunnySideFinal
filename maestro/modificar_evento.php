<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: modificar_evento.php)\n";
  exit;
}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/estilos.css" rel="stylesheet">
<body>
  <?php
  include "header_maestro.php";
  ?>
  <?php
  $fechahora = $_GET['fechahora'];
  $descripcion = $_GET['descripcion'];
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Modificar evento</h2>
  </center>
  <form action= "modificando_evento.php?oldfechahora=<?php echo $fechahora;?>&olddescripcion=<?php echo urlencode($descripcion);?>" method="post">
      <input type="date" class="login-input" name="newfechahora" placeholder=" Fecha y hora" autofocus required="">
      <input type="text" class="login-input" name="newdescripcion" placeholder=" Descripción" autofocus required="">
      <input type="submit" value="Siguiente" class="siguiente-button">
  </form>
</body>
</html>
