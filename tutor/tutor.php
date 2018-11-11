<?php

$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: tutor.php)\n";
  exit;
}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<link href="../css/estilos.css" rel="stylesheet">
<body>
  <?php
  include "header_perfiles.php";
  ?>
  <center>
    <h2 class = "bienvenido__tutor">¡Bienvenido a SunnySide Tutor!</h2>
  </center>
  <?php
  include "../sesiones.php";
  $usuario = $_SESSION['usuario'];

  $sql_dpi = "SELECT dpi FROM tutor WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_dpi);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: tutor.php, dpi).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $dpi = $row1['dpi'];
  //echo $dpi;

  $sql_nombrea = "SELECT nombrea FROM alumno WHERE dpi = $dpi";
  $result2 = pg_query($dbconn, $sql_nombrea);
  if (!$result2) {
    echo "Ocurrió un error con query (Archivo: tutor.php, dpi).\n";
    exit;
  }
  ?>
  <center>
  <?php

  while ($row = pg_fetch_array($result2)) {
    $nombrea = $row['nombrea'];

  ?>
  <form  action= "alumno.php" method="post">
      <img src="../img/niños_icono.png" width = "200px" height="200px">
      <button class="siguiente-button" name="nombrea" value = "<?php echo $nombrea; ?>" type="submit"><?php echo $nombrea;?></button>
  </form>
  <?php
  }
  ?>

  </center>

</body>
</html>
