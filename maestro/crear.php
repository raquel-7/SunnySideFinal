<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: crear.php)\n";
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
  <center>
    <h2 class = "bienvenido__tutor">Crear evento</h2>
  </center>
  <form action= "creando_evento.php" method="post">
      <input type="date" class="login-input" name="fechahora" placeholder=" Fecha y hora" autofocus required="">
      <input type="text" class="login-input" name="descripcion" placeholder=" Descripción" autofocus required="">
      <input type="submit" value="Siguiente" class="siguiente-button">
  </form>

</body>
</html>
