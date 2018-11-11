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
      echo "Ocurrió un error con la conexion .\n";
      exit;
    }
    $usuario= $_POST['usuario'];
    $passw = $_POST['contrasena'];
    if ($usuario == "admin" && $passw == "123"){

          header('Location: admin/index.php');

    }
    $sql = "SELECT * FROM usuarios WHERE username = '$usuario' AND contraseña = '$passw'";
    print_r($r);
   $r = pg_query($dbconn, $sql);
    if (!$r) {
      echo "Ocurrió un error con query.\n";
      exit;
    }

   $login_check = pg_num_rows($r);
   #echo $login_check;

   if($login_check == 1){
         $_SESSION['usuario']=$usuario;
         echo '<script type="text/javascript"> window.open("silogea.php","_self");</script>';
         #echo $usuario;
       }else{
           echo "invalid UserName or Password";
           echo '<script type="text/javascript"> window.open("login.php","_self");</script>';
       }

     ?>
  </body>
</html>
