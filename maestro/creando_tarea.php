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
    $idcurso = $_POST['idcurso'];

    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: creando_tarea.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];
    //echo $dpi;

    //INSERT INTO calendario VALUES('2018/10/10','evento1',NULL,3102021,'Estrellas')
    $sql_nombreg = "SELECT nombreg FROM maestro WHERE dpi =$dpi";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: creando_tarea.php, nombreg).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombreg = $row2['nombreg'];
    //echo $nombreg;

    $sql_curso = "SELECT nombrec FROM curso WHERE idcurso ='$idcurso' AND nombregrupo ='$nombreg'";
    $result3 = pg_query($dbconn, $sql_curso);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: creando_tareao.php, idcurso).\n";
      exit;
    }

    $row3 = pg_fetch_array($result3);
    $nombrec = $row3['nombrec'];

    /*
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo $nombrec;
    echo "<br>";
    echo $descripcion;
    echo "<br>";
    echo $fechahora;
    echo "<br>";
    echo $idcurso;
    echo "<br>";
    echo $nombreg;
    echo "<br>";
    */

    $sql_insert = "INSERT INTO tareas VALUES('$descripcion','$fechahora','$idcurso','$nombrec','$nombreg')";
    $result4 = pg_query($dbconn, $sql_insert);
    if (!$result4) {
      echo "Ocurrió un error con query (Archivo: creando_tarea.php, insert).\n";
      exit;
    }
     ?>
     <center>
       <h2 class = "bienvenido__tutor">Tarea creada exitosamente</h2>
     </center>
  </body>
</html>
