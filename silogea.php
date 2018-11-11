<!DOCTYPE html>
<html dir="ltr">
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
      echo "Ocurrió un error con la conexion. (Archivo: silogea.php)\n";
      exit;
    }

    $usuario = $_SESSION['usuario'];

    $sql1 = "SELECT * FROM maestro WHERE username = '$usuario'";
    print_r($r1);
   $r1 = pg_query($dbconn, $sql1);
    if (!$r1) {
      echo "Ocurrió un error con query.(Archivo: silogea.php, query:sql) \n";
      exit;
    }

   $maestro = pg_num_rows($r1);
   #echo $login_check;

   $sql2 = "SELECT * FROM tutor WHERE username = '$usuario'";
   print_r($r2);
   $r2 = pg_query($dbconn, $sql2);
   if (!$r2) {
     echo "Ocurrió un error con query.(Archivo: silogea.php, query:sql) \n";
     exit;
   }

   $tutor = pg_num_rows($r2);

   if($maestro == 1){
        echo '<script type="text/javascript"> window.open("maestro/maestro.php","_self");</script>';

      }else if ($tutor==1) {
        echo '<script type="text/javascript"> window.open("tutor/tutor.php","_self");</script>';
      }

     ?>
  </body>
</html>
