<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: eliminar_evento.php)\n";
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
  //<input type="submit" name="Eliminar" value="Sí" class="login-button">
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Eliminar evento</h2>
  </center>
  <form class="login" action= "eliminando_evento.php?fechahora=<?php echo $fechahora;?>&descripcion=<?php echo urlencode($descripcion);?>" method="post">
      <h1 class="login-title">Eliminación de evento</h1>
      <h5 class="login-title">¿Esta seguro de querer eliminar este evento?</h5>
      <div >
        <button class="login-button" name="eliminacion" value = "si" type="submit">Si</button>
      </div>
      <br>
      <div >
          <button class="login-button" name= "eliminacion" value = "no" type="submit">No</button>
      </div>
  </form>
</body>
</html>
