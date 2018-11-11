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
      echo "Ocurrió un error con la conexion. (Archivo: eliminando_tarea.php)\n";
      exit;
    }

    $fecha = base64_decode($_GET['fecha']);
    $nombrec = base64_decode($_GET['nombrec']);
    $nombreg = base64_decode($_GET['nombreg']);
    $descripcion= base64_decode($_GET['descripcion']);
    $idcurso= base64_decode($_GET['idcurso']);

    /*
    echo $fecha;
    echo "<br>";
    echo $nombreg;
    echo "<br>";
    echo $nombrec;
    echo "<br>";
    echo $descripcion;
    echo "<br>";
    echo $idcurso;
    echo "<br>";*/

    $sql_delete = "DELETE FROM tareas WHERE fecha = '$fecha'
                   AND descripcion = '$descripcion' AND nombrec = '$nombrec' AND nombreg = '$nombreg'
                   AND idcurso = '$idcurso'";
    $result3 = pg_query($dbconn, $sql_delete);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: eliminando_evento.php, delete).\n";
      exit;
    }
     ?>
     <center>
       <h2 class = "bienvenido__tutor">Tarea eliminada exitosamente</h2>
     </center>
  </body>
</html>
