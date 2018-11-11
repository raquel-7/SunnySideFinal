<!DOCTYPE html>
<html dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <link href="../css/estilos.css" rel="stylesheet">
  <body>
    <?php
    include "header_maestro.php";
    ?>
    <?php
    include "../sesiones.php";
    $host="localhost";
    $user="postgres";
    $pass="123abc";
    $dbname="SUNNYSIDE";
    $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

    if (!$dbconn) {
      echo "Ocurrió un error con la conexion. (Archivo: creando_reporteD.php)\n";
      exit;
    }

    $fecha = $_POST['fecha'];
    $actividad = $_POST['actividad'];
    $observacion = $_POST['observacion'];
    $idalumno = $_POST['idalumno'];
    $calificacion = $_POST['calificacion'];

    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: creando_reporteB.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];

    $sql_insert = "INSERT INTO reporte VALUES('$actividad','$observacion','$fecha',$calificacion,'B','$idalumno',$dpi)";
    $result3 = pg_query($dbconn, $sql_insert);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: creando_evento.php, insert).\n";
      exit;
    }
     ?>
     <center>
       <h2 class = "bienvenido__tutor">Reporte Bimestral creado exitosamente</h2>
     </center>
     <center>
       <a class="menu__link" href="crear_reporteB.php">Insertar otro</a>
     </center>
  </body>
</html>
