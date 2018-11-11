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
      echo "Ocurrió un error con la conexion. (Archivo: modificando_evento.php)\n";
      exit;
    }

    $actividad = $_POST['actividad'];
    $observacion = $_POST['observacion'];
    $fecha = $_POST['fecha'];
    $calificacion = $_POST['calificacion'];
    $idalumno = $_POST['idalumno'];

    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: modificando_reporteD.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];
    //echo $dpi;

    /*UPDATE reporte SET actividad = 'Tareas', observacion = 'lala', calificacion = 3 WHERE fecha = '16/09/2018'
    AND tiporeporte = 'D' AND idalumno ='1234' AND dpi = 3102021*/
    $sql_update = "UPDATE reporte SET actividad = '$actividad', observacion = '$observacion', calificacion = $calificacion
                   WHERE fecha = '$fecha'AND tiporeporte = 'D' AND idalumno ='$idalumno' AND dpi = $dpi";
    $result3 = pg_query($dbconn, $sql_update);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: modificando_reporteD.php, update).\n";
      exit;
    }
     ?>
     <center>
       <h2 class = "bienvenido__tutor">Reporte diario del día <?php echo $fecha; ?> editado exitosamente</h2>
     </center>

  </body>
</html>
