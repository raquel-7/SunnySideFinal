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
    $fecha_actual = date("d-m-Y H:i:00",time());
    $usuario = $_SESSION['usuario'];

    /***************************** NOMBREG **************************************/
    $sql_nombreg = "SELECT nombreg FROM maestro WHERE username = '$usuario'";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: crear_reporteD.php, nombreg).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombreg = $row2['nombreg'];

    /***************************** INFO ALUMNO *********************************/
    $sql_alumno = "SELECT idalumno, nombrea FROM alumno WHERE nombregrupo = '$nombreg'";
    $result3 = pg_query($dbconn, $sql_alumno);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: crear_reporteD.php, info alumno).\n";
      exit;
    }

  ?>
  <center>
    <h2 class = "bienvenido__tutor">Crear reporte Diario</h2>
  </center>
  <br>
  <form action= "creando_reporteD.php" method="post">
    <center>
      <label>FECHA:</label>
      <input type="text" class="login-input" name="fechahora" value=<?php echo $fecha_actual; ?> readonly>
      <br>
      <label>ALUMNO:</label>
      <select name ="idalumno" class="login-input">
        <option selected disabled>Seleccione un alumno</option>
        <?php
            while ($row3 = pg_fetch_array($result3)) {
              $idalumno = $row3['idalumno'];
              $nombrea = $row3['nombrea'];
          ?>
        <option value="<?php echo $idalumno;?>"><?php echo $nombrea;?></option>
        <?php
            }
        ?>
      </select>
      <br>
      <label>ACTIVIDAD: </label>
      <input type="text" class="login-input" name="actividad" placeholder=" Actividad" autofocus required="">
      <br>
      <label>OBSERVACIÓN: </label>
      <input type="text" class="login-input" name="observacion" placeholder=" Observación" autofocus required="">
      <br>
      <label>CALIFICACIÓN:</label>
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
