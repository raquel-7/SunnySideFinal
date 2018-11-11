<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion .\n";
  exit;
}

?>
<html>
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="../css/estilos.css" rel="stylesheet">
<body>
  <?php
  include "header_maestro.php";
  ?>
  <?php
  $usuario = $_SESSION['usuario'];
  $sql_select = "SELECT * FROM maestro WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_select);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: maestro.php, select).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $nombrep = $row1['nombrep'];
  $dpi = $row1['dpi'];
  $direccion = $row1['direccion'];
  $telefono = $row1['telefono'];
  $fechanac = $row1['fechanac'];
  $nombreg = $row1['nombreg'];
  ?>
  <center>
  <h2 class = "bienvenido__tutor">¡Bienvenido a SunnySide!</h2>
  </center>
  <div class="perfil">
    <h1 class="perfil-title">Maestro</h1>
    <center><img src="../img/profesor_icono.png" width = "200px" height="200px"></center>
    <br>
    NOMBRE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombrep" value=<?php echo $nombrep; ?> readonly="readonly" >
    <br>
    DPI: <br> <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="dpi" value=<?php echo $dpi; ?> readonly="readonly" >
    <br>
    DIRECCIÓN: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="direccion" value=<?php echo $direccion; ?> readonly="readonly" >
    <br>
    TELÉFONO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="telefono" value=<?php echo $telefono; ?> readonly="readonly" >
    <br>
    FECHA DE NACIMIENTO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="fechanac" value=<?php echo $fechanac; ?> readonly="readonly" >
    <br>
    GRUPO AL QUE IMPARTE CLASE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombreg" value=<?php echo $nombreg; ?> readonly="readonly" >
  </div>

</body>
</html>
