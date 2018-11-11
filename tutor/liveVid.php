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

<head><title>liveVid</title></head>
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
<style>
<?php
include "../css/estilos.css";
include 'header_maestro.php';

?>
</style>
<body>

  <h1 style=" text-align: center; margin-top:100px;">Video en vivo</h1>
  <form enctype="multipart/form-data" action="subirVideo.php" method="GET">
<div class="rowgaleria"  >

<iframe width="85%" height="85%" style="margin-left:10%"
src="https://www.youtube.com/embed/12CU9xUvPOg">
</iframe>
</div>
  </form>
</body>
<script src="../js/menu.js"></script>
<script>

</script>
</html>
