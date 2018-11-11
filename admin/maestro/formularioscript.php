<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <body>
    <?php
    session_start();

    $host="localhost";
    $user="postgres";
    $pass="123abc";
    $dbname="SUNNYSIDE";
    $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

    if (!$dbconn) {
      echo "Ocurrió un error con la conexion .\n";
      exit;
    }
    $nombre = $_GET['nombrep'];
    $usuario = $_GET['usuario'];
    $dpi = $_GET['dpi'];
    $direccion = $_GET['direccion'];
    $telefono = $_GET['telefono'];
    $fecha = $_GET['fecha'];
    $nombregrupo = $_GET['nombregrupo'];
    $query = "INSERT INTO maestro VALUES('$nombre' ,'$usuario','$dpi', '$direccion','$telefono', '$fecha', '$nombregrupo' )";
    $send = pg_query($dbconn, $query);
    if(!$send){
      echo "Error al enviar campos";
    }else {
      echo "Registrado!";
      echo "<script type='text/javascript'> window.open('../index.php','_self');</script>";
    }

     ?>


  </body>
</html>
