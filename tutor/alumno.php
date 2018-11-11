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
<link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<link href="../css/estilos.css" rel="stylesheet">
<?php
  include "../sesiones.php";
  //session_start();
  $nalumno="";
  $nombrea = $_POST['nombrea'];

  if (isset($_GET['nombre'])) {
    $nalumno = base64_decode($_GET['nombre']);
    $nombrea = $nalumno;
  }else{
    $nalumno = $nombrea;
  }

  $usuario = $_SESSION['usuario'];


  //include "header_alumno.php";

  //$_SESSION['alumno'] = $nombrea;
  /****************************** DPI *****************************************/
  $sql_dpi = "SELECT dpi FROM tutor WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_dpi);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: alumno.php, dpi).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $dpi = $row1['dpi'];
  //echo $dpi;

  //SELECT * FROM alumno WHERE dpi=123456 AND nombrea = 'Matias'
  /****************************** ALUMNO *****************************************/
  $sql_datos = "SELECT * FROM alumno WHERE dpi=$dpi AND nombrea = '$nombrea'";
  $result2 = pg_query($dbconn, $sql_datos);
  if (!$result2) {
    echo "Ocurrió un error con query (Archivo: alumno.php, select).\n";
    exit;
  }

  $row2 = pg_fetch_array($result2);
  $idalumno = $row2['idalumno'];
  $fechanac = $row2['fechanac'];
  $nombreg = $row2['nombregrupo'];

  $alumno = "";
  if (isset($_GET['alumno'])) {
    $alumno = base64_decode($_GET['alumno']);
    //$nombrea = $alumno;
  }else{
    $alumno = $idalumno;
  }
?>
<header class="header">
  <div class="contenedor">
    <a href="alumno.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>" class="logo"><img src="../img/small-icon.png" width = "200px" height="150px"></a>
    <span class="icon-menu" id="btn-menu"></span>
    <nav class="nav" id="nav">
      <ul class="menu">
        <li class="menu__item"><a class="menu__link" href="alumno.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>"><center><img src="../img/home.png" width = "40px" height="40px"></center><br>HOME</a>
        <ul>
          <li class="menu__item"><a class="menu__link" href="tutor.php"><center><img src="../img/cambio_usuario.png" width = "40px" height="40px"></center><br>CAMBIAR USUARIO</a></li>
        </ul>
        </li>
        <li class="menu__item"><a class="menu__link" href="reportes_alumno.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>"><center><img src="../img/reportes.png" width = "40px" height="40px"></center><br>REPORTES</a></li>
        <li class="menu__item"><a class="menu__link" href="calendario.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>"><center><img src="../img/calendario.png" width = "40px" height="40px"></center><br>CALENDARIZACION</a></li>
        <li class="menu__item"><a class="menu__link" href="tareas.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>"><center><img src="../img/tareas.png" width = "40px" height="40px"></center><br>TAREAS</a></li>
        <li class="menu__item"><a class="menu__link" href="tutor_perfil.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>"><center><img src="../img/padre.png" width = "40px" height="40px"></center><br>MI PERFIL</a></li>
        <li class="menu__item"><a class="menu__link" href="mostrargaleria.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>"><center><img src="../img/gallery.png" width = "40px" height="40px"></center><br>GALERIA</a></li>
        <li class="menu__item"><a class="menu__link" href="liveVid.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>"><center><img src="../img/youtube.png" width = "40px" height="40px"></center><br>VIDEOS</a></li>
        <li class="menu__item"><a class="menu__link" href="../logout.php"><center><img src="../img/salida.png" width = "40px" height="40px"></center><br>LOG OUT</a></li>
      </ul>
    </nav>
  </div>
</header>
<body>
  <script src="../js/menu.js"></script>
  <center>
    <h2 class = "bienvenido__tutor">¡Bienvenido a SunnySide!</h2>
  </center>
  <form class="perfil" action= "perfil_maestro.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>" method="post">
    <h1 class="perfil-title">Alumno</h1>
    <center><img src="../img/niños_icono.png" width = "200px" height="200px"></center>
    <br>
    NOMBRE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombrea" value=<?php echo $nombrea;  ?> readonly>
    <br>
    ID ALUMNO: <br> <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="idalumno" value=<?php echo $idalumno; ?> readonly>
    <br>
    FECHA DE NACIMIENTO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="fechanac" value=<?php echo $fechanac; ?> readonly>
    <br>
    GRUPO AL QUE PERTENECE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombreg" value=<?php echo $nombreg; ?> readonly>
    <div >
      <button class="perfil-button" name="nombrea" value = "<?php echo $nombrea; ?>" type="submit">Ver maestro encargado</button>
    </div>
  </form>
</body>
</html>
