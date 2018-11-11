<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: crear_reporteD.php)\n";
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
  $fecha = $_GET['fecha'];
  $descripcion = $_GET['descripcion'];
  $nombrec = $_GET['nombrec'];
  $nombreg = $_GET['nombreg'];
  $idcurso= $_GET['idcurso'];

  ?>
  <center>
    <h2 class = "bienvenido__tutor">Editar tarea</h2>
  </center>
  <br>
  <form action= "editando_tarea.php?oldfecha=<?php echo $fecha?>&olddescripcion=<?php echo $descripcion?>&nombrec=<?php echo $nombrec?>&nombreg=<?php echo $nombreg?>&idcurso=<?php echo $idcurso?>" method="post">
    <center>
      <label>FECHA DE ENTREGA:</label>
      <input type="date" class="login-input" name="fechahora" placeholder=" Fecha y hora" autofocus required="">
      <br>
      <label>DESCRIPCIÓN: </label>
      <input type="text" class="login-input" name="descripcion" placeholder=" Descripción" autofocus required="">
      <br>
      <input type="submit" value="Siguiente" class="siguiente-button">
    </center>
  </form>
</body>
</html>
