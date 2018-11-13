<?php
session_start();
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conxion .\n";
  exit;
}

?>
<html>
<style>
</style>
<body>
  <?php
  include "header-admin.php";
  ?>
  <div class="banner">
    <img src= "../img/bebe1.jpg" class = "banner__img">
    <div class = "contenedor">
      <h1 class = "banner__titulo">¡Bienvenido a SunnySide!</h1>
      <p class= "banner__txt">La mejor aplicación web para gestión de guarderías y preescolares</p>
    </div>
  </div>

</body>
</html>
