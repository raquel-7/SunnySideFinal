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

?>
<html>
<link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<link href="../css/estilos.css" rel="stylesheet">
<head><title>Live Video</title></head>

<body>
  <?php
  include 'header_maestro.php';
  ?>
  <h1 style=" text-align: center; margin-top:100px;">Live Video</h1>
<div >
  <a href="https://www.youtube.com/webcam" style="margin-left:45%" ><img src="../img/arrow.gif" alt="Ir a video en vivo"width="100px"><img src="../img/vid.png" alt="Ir a video en vivo"></a>
</div>
  <form enctype="multipart/form-data" action="subirVideo.php" method="GET">
<div class="rowgaleria"  >
<iframe width="85%" height="85%" style="margin-left:10%"
src="https://www.youtube.com/embed/tgbNymZ7vqY">
</iframe>
</div>
  </form>
</body>
<script src="../js/menu.js"></script>
<script>

</script>
</html>
