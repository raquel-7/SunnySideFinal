<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: editar_reporteD.php)\n";
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
    $fecha = base64_decode($_GET['fecha']);
    $idalumno = base64_decode($_GET['idalumno']);

    /***************************** INFO ALUMNO *********************************/
    $sql_nombrea = "SELECT nombrea FROM alumno WHERE idalumno = '$idalumno'";
    $result = pg_query($dbconn, $sql_nombrea);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: editar_reporteD.php, nombrea).\n";
      exit;
    }

    $row = pg_fetch_array($result);
    $nombrea = $row['nombrea'];
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Editar reporte Diario</h2>
  </center>
  <br>
  <form action= "modificando_reporteD.php" method="post">
    <center>
      FECHA: <input type="text" class="login-input" name="fecha" value=<?php echo $fecha; ?> readonly>
      <br>
      ID ALUMNO: <input type="text" class="login-input" name="idalumno" value=<?php echo $idalumno; ?> readonly>
      <br>
      NOMBRE ALUMNO: <input type="text" class="login-input" name="nombrea" value=<?php echo $nombrea; ?> readonly>
      <br>
      ACTIVIDAD: <input type="text" class="login-input" name="actividad" placeholder=" Actividad" autofocus required="">
      <br>
      OBSERVACIÓN: <input type="text" class="login-input" name="observacion" placeholder=" Observación" autofocus required="">
      <br>
      CALIFICACIÓN:
      <p class="calificacion">
        <input id="radio1" type="radio" name="calificacion" value="5"><!--
        --><label for="radio1">★</label><!--
        --><input id="radio2" type="radio" name="calificacion" value="4"><!--
        --><label for="radio2">★</label><!--
        --><input id="radio3" type="radio" name="calificacion" value="3"><!--
        --><label for="radio3">★</label><!--
        --><input id="radio4" type="radio" name="calificacion" value="2"><!--
        --><label for="radio4">★</label><!--
        --><input id="radio5" type="radio" name="calificacion" value="1"><!--
        --><label for="radio5">★</label>
      </p>
      <input type="submit" value="Siguiente" class="siguiente-button">
    </center>
  </form>
</body>
</html>
