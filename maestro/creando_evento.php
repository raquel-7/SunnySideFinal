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
      echo "Ocurrió un error con la conexion. (Archivo: creando_evento.php)\n";
      exit;
    }

    $fechahora = $_POST['fechahora'];
    $descripcion = $_POST['descripcion'];

    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: creando_evento.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];
    //echo $dpi;

    //INSERT INTO calendario VALUES('2018/10/10','evento1',NULL,3102021,'Estrellas')
    $sql_nombreg = "SELECT nombreg FROM maestro WHERE dpi =$dpi";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: creando_evento.php, nombreg).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombreg = $row2['nombreg'];
    //echo $nombreg;

    $sql_insert = "INSERT INTO calendario VALUES('$fechahora','$descripcion',$dpi,'$nombreg')";
    $result3 = pg_query($dbconn, $sql_insert);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: creando_evento.php, insert).\n";
      exit;
    }
     ?>
     <center>
       <h2 class = "bienvenido__tutor">Evento creado exitosamente para <?php echo $nombreg;?></h2>
     </center>
  </body>
</html>
