<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title></title>
  </head>
  <style>
  <?php
  include "estilos.css";
  ?>
  </style>
  <body>
    <?php
    session_start();
    $host="localhost";
    $user="postgres";
    $pass="123abc";
    $dbname="SUNNYSIDE";
    $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

    if (!$dbconn) {
      echo "Ocurrió un error con la conexion (Archivo: login.php).\n";
      exit;
    }

      ?>
      <?php
      include "header.php";
      ?>
    <form class="login" action= "ingresar.php" method="post">
        <h1 class="login-title">¡Hola de nuevo!</h1>
        <h5 class="login-title">Ingresa el usuario y contraseña de tu cuenta</h5>
        <i class='fa fa-user-o'></i><input type="text" class="login-input" name="usuario" placeholder=" Usuario" autofocus required="">
        <i class="fa fa-key" aria-hidden="true"></i><input type="password" class="login-input" name ="contrasena" placeholder="Contraseña" required="">
        <input type="submit" value="Siguiente" class="login-button">
    </form>

    <footer class = "footer">
      <div class="social">
        <a href="https://www.facebook.com/" class="icon-facebook"></a>
        <a href="https://twitter.com/" class="icon-twitter"></a>
        <a href="https://www.instagram.com/" class="icon-instagram"></a>
      </div>
      <p class="copy">&copy; SunnySide 2018 - Todos los derechos reservados</p>
    </footer>
  </body>

</html>
