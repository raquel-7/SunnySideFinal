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

    $email = $_POST['email'];
    if($email !='')
            {
                extract($_POST);
                $checkemail =$email;
                $user = preg_replace('/([^@]*).*/', '$1', $checkemail);
                echo $uuser = $user.rand ( 1 , 99 );
                $insertarUsuario = "INSERT INTO usuarios (username, email) VALUES ('$uuser','$email')";
                $result = pg_query($dbconn, $insertarUsuario);
                echo $email;
                echo "<script type='text/javascript'> window.open('http://localhost/SunnySideFinal/admin/tutor/mail/logic.php?email=$email&usuario=$uuser','_self');</script>";

            }
            ?>





  </body>
</html>
