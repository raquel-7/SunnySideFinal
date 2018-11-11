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

    $oldfechahora = $_GET['oldfechahora'];
    $olddescripcion = $_GET['olddescripcion'];
    $newfechahora = $_POST['newfechahora'];
    $newdescripcion = $_POST['newdescripcion'];

    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: modificando_evento.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];
    //echo $dpi;


    $sql_nombreg = "SELECT nombreg FROM maestro WHERE dpi =$dpi";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: modificando_evento.php, nombreg).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombreg = $row2['nombreg'];
    //echo $nombreg;

    /*UPDATE calendario SET fechahora = '23/09/2018', descripcion = 'dfg' WHERE fechahora = '22/09/2018' AND descripcion = 'rtyui'
    AND dpi = 3102021 AND nombregrupo = 'Estrellas'*/
    $sql_update = "UPDATE calendario SET fechahora = '$newfechahora', descripcion = '$newdescripcion'
                   WHERE fechahora = '$oldfechahora' AND descripcion = '$olddescripcion'
                   AND dpi = $dpi AND nombregrupo = '$nombreg'";
    $result3 = pg_query($dbconn, $sql_update);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: modificando_evento.php, insert).\n";
      exit;
    }
     ?>
     <center>
       <h2 class = "bienvenido__tutor">Evento editado exitosamente para <?php echo $nombreg;?></h2>
     </center>
  </body>
</html>
