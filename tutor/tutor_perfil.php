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
  $nalumno = base64_decode($_GET['nombre']);
  $alumno = base64_decode($_GET['alumno']);
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
  <?php
  include "../sesiones.php";
  $usuario = $_SESSION['usuario'];

  //include "header_alumno.php";

  $sql_select = "SELECT * FROM tutor WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_select);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: tutor_perfil.php, select).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $nombret = $row1['nombret'];
  $dpi = $row1['dpi'];
  $direccion = $row1['direccion'];
  $telefono = $row1['telefono'];
  $fechanac = $row1['fechanac'];


  ?>
  <center>
    <h2 class = "bienvenido__tutor">Mi Perfil</h2>
  </center>
  <form class="perfil" action= "perfil_maestro.php?nombrea=<?php echo $nombrea ?>" method="post">
    <h1 class="perfil-title">Tutor</h1>
    <center><img src="../img/familia.png" width = "200px" height="200px"></center>
    <br>
    NOMBRE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombret" value=<?php echo $nombret; ?> readonly="readonly" >
    <br>
    DPI: <br> <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="dpi" value=<?php echo $dpi; ?> readonly="readonly" >
    <br>
    DIRECCIÓN: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="direccion" value=<?php echo $direccion; ?> readonly="readonly" >
    <br>
    TELEFONO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="telefono" value=<?php echo $telefono; ?> readonly="readonly" >
    <br>
    FECHA DE NACIMIENTO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="fechanac" value=<?php echo $fechanac; ?> readonly="readonly" >
    </div>
  </form>

</body>
</html>
