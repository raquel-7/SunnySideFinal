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
    $nombre = $_GET['usuario'];
    $email = $_GET['email'];
    $contrasena = $_GET['contrasena'];

    $query = "UPDATE usuarios SET contrasena = '$contrasena' WHERE email = '$email'";

    $send = pg_query($dbconn, $query);
    if(!$send){
      echo "Error al enviar campos";
    }else {
      echo "Registrado!";
      echo "<script type='text/javascript'> window.open('formulariomaestro.php?username=".$nombre."&email=".$email."','_self');</script>";
    }

     ?>


  </body>
</html>
