<?php
include "../sesiones.php";
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
<script src="js/menu.js"></script>
  <?php
  $nombrea = $_POST['nombrea'];
  $usuario = $_SESSION['usuario'];

  $sql_dpi = "SELECT dpi FROM tutor WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_dpi);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: perfil_maestro.php, dpi).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $dpi = $row1['dpi'];
  //echo $dpi;

  //SELECT * FROM alumno WHERE dpi=123456 AND nombrea = 'Matias'
  $sql_nombreg = "SELECT nombregrupo FROM alumno WHERE dpi=$dpi AND nombrea = '$nombrea'";
  $result2 = pg_query($dbconn, $sql_nombreg);
  if (!$result2) {
    echo "Ocurrió un error con query (Archivo: perfil_maestro.php, nombreg).\n";
    exit;
  }

  $row2 = pg_fetch_array($result2);
  $nombreg = $row2['nombregrupo'];

  //SELECT nombrep, telefono, fechanac FROM maestro WHERE nombreg= 'Estrellas'
  $sql_select = "SELECT nombrep, telefono, fechanac FROM maestro WHERE nombreg= '$nombreg'";
  $result3 = pg_query($dbconn, $sql_select);
  if (!$result3) {
    echo "Ocurrió un error con query (Archivo: perfil_maestro.php, select).\n";
    exit;
  }

  $row3 = pg_fetch_array($result3);
  $nombrep = $row3['nombrep'];
  $telefono = $row3['telefono'];
  $fechanac = $row3['fechanac'];
  ?>
  <center>
  <h2 class = "bienvenido__tutor">Maestro encargado!</h2>
  </center>
  <div class="perfil">
    <h1 class="perfil-title">Maestro</h1>
    <center><img src="img/profesor_icono.png" width = "200px" height="200px"></center>
    <br>
    NOMBRE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombrep" value=<?php echo $nombrep; ?> readonly>
    <br>
    TELÉFONO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="telefono" value=<?php echo $telefono; ?> readonly>
    <br>
    FECHA DE NACIMIENTO: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="fechanac" value=<?php echo $fechanac; ?> readonly>
    <br>
    GRUPO AL QUE IMPARTE CLASE: <i class='fa fa-user-o'></i><input type="text" class="perfil-input" name="nombreg" value=<?php echo $nombreg; ?> readonly>
  </div>

</body>
</html>
