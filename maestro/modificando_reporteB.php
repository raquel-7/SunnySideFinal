<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: modificando_reporteB.php)\n";
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
    $idalumno = base64_decode($_GET['idalumno']);
    $nombrea = base64_decode($_GET['nombrea']);
    $curso = base64_decode($_GET['curso']);
    $bimestre = base64_decode($_GET['bimestre']);
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Editar reporte bimestral</h2>
    Para el campo "fecha" ingrese una fecha con el mes del bimestre que desea realizar el reporte.
  </center>
  <br>
  <form action= "editando_reporteB.php" method="post">
    <center>
      FECHA: <input type="date" class="login-input" name="fecha" autofocus required="">
      <br>
      ID ALUMNO: <input type="text" class="login-input" name="idalumno" value=<?php echo $idalumno; ?> readonly>
      <br>
      NOMBRE ALUMNO: <input type="text" class="login-input" name="nombrea" value=<?php echo $nombrea; ?> readonly>
      <br>
      CURSO: <input type="text" class="login-input" name="actividad" value=<?php echo $curso; ?> readonly>
      <br>
      OBSERVACIÓN: <input type="text" class="login-input" name="observacion" placeholder=" Observación" autofocus required="">
      <br>
      CALIFICACIÓN: <input type="text" class="login-input" name="calificacion" placeholder=" Calificación" autofocus required="">
      <br>
      <input type="submit" value="Siguiente" class="siguiente-button">
    </center>
  </form>

</body>
</html>
