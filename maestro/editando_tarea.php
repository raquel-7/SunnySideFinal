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
      echo "Ocurrió un error con la conexion. (Archivo: editando_tarea.php)\n";
      exit;
    }

    $fecha = $_POST['fechahora'];
    $descripcion= $_POST['descripcion'];
    $oldfecha = base64_decode($_GET['oldfecha']);
    $olddescripcion = base64_decode($_GET['olddescripcion']);
    $nombrec = base64_decode($_GET['nombrec']);
    $nombreg = base64_decode($_GET['nombreg']);
    $idcurso= base64_decode($_GET['idcurso']);

    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: editando_tarea.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];
    //echo $dpi;
    /*echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo $fecha;
    echo "<br>";
    echo $descripcion;
    echo "<br>";
    echo $nombrec;
    echo "<br>";
    echo $nombreg;
    echo "<br>";
    echo $idcurso;
    echo "<br>";
    /*UPDATE calendario SET fechahora = '23/09/2018', descripcion = 'dfg' WHERE fechahora = '22/09/2018' AND descripcion = 'rtyui'
    AND dpi = 3102021 AND nombregrupo = 'Estrellas'*/
    $sql_update = "UPDATE tareas SET fecha = '$fecha', descripcion = '$descripcion'
                   WHERE nombrec = '$nombrec' AND idcurso = '$idcurso' AND nombreg = '$nombreg'
                   AND fecha='$oldfecha' AND descripcion = '$olddescripcion'";
    $result3 = pg_query($dbconn, $sql_update);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: editando_tarea.php, update).\n";
      exit;
    }
     ?>
     <center>
       <h2 class = "bienvenido__tutor">Tarea editada exitosamente</h2>
     </center>
     
  </body>
</html>
