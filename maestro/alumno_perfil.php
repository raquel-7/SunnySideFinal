<?php

$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: alumno.php)\n";
  exit;
}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="../css/estilos.css" rel="stylesheet">

<body>
  <?php
  include "../sesiones.php";
  $idalumno = base64_decode($_GET['idalumno']);
  $nombrea = base64_decode($_GET['nombrea']);
  $usuario = $_SESSION['usuario'];

  include "header_maestro.php";

  /***************************** NOMBRE GRUPO *********************************/
  $sql_grupo = "SELECT nombreg FROM maestro WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_grupo);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: listado_alumnos.php, grupo).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $nombreg = $row1['nombreg'];


  $sql_datos = "SELECT * FROM alumno WHERE nombregrupo = '$nombreg' AND idalumno = '$idalumno'";
  $result2 = pg_query($dbconn, $sql_datos);
  if (!$result2) {
    echo "Ocurrió un error con query (Archivo: alumno_perfil.php, datos).\n";
    exit;
  }

  $row2 = pg_fetch_array($result2);
  $fechanac = $row2['fechanac'];

  ?>
  <center>
    <h2 class = "bienvenido__tutor">Perfil de alumno</h2>
  </center>
  <div class="perfil">
    <h1 class="perfil-title">Alumno</h1>
    <center><img src="../img/niños_icono.png" width = "200px" height="200px"></center>
    <br>
    NOMBRE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombrea" value=<?php echo $nombrea; ?> readonly="readonly" >
    <br>
    ID ALUMNO: <br> <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="idalumno" value=<?php echo $idalumno; ?> readonly="readonly" >
    <br>
    FECHA DE NACIMIENTO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="fechanac" value=<?php echo $fechanac; ?> readonly="readonly" >
    <br>
    GRUPO AL QUE PERTENECE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombreg" value=<?php echo $nombreg; ?> readonly="readonly" >
  </div>

</body>
</html>
