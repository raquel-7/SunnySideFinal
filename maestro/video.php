<?php
//include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conxion .\n";
  exit;
}
session_start();
$_SESSION['video'] = $_GET['namevid'];


?>
<html>
<link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">

<head><title>Video en Vivo - SunnySide</title></head>
<style>
<?php
include "../css/estilos.css";


?>
</style>
<body>
<?php
include 'header_maestro.php'; ?>
  <h1 style=" text-align: center; margin-top:100px;">Live Video</h1>
<div >
  <a href="https://www.youtube.com/webcam" style="margin-left:45%" ><img src="../img/arrow.gif" alt="Ir a video en vivo"width="100px"><img src="../img/vid.png" alt="Ir a video en vivo"></a>
  <form   align="center" action="video.php" method="get">
    <input class="login-input" type="text" name="namevid" placeholder="Ingresa el link del video ">
    <input class="login-button" style="width:12%; height: 5%;" type="submit" name="submit" value="Transmitir Video">
  </form>
</div>

<div class="rowgaleria"  >
  <?php
  if(isset($_SESSION['video'])) {
    $token = ltrim($_SESSION['video'],'https://youtu.be/');
    $link = "https://www.youtube.com/embed/$token";

    ?>

    <iframe width="85%" height="85%" style="margin-left:10%"
    src="<?php echo $link; ?>"  frameborder="0" allowfullscreen>
    <?php

  }else{
    ?>
    <iframe width="85%" height="85%" style="margin-left:10%"
    src="https://www.youtube.com/embed/1roy4o4tqQM" frameborder="0" allowfullscreen>
    <?php
  }
   ?>

</iframe>
</div>
</body>
<script src="../js/menu.js"></script>
<script>

</script>
</html>
