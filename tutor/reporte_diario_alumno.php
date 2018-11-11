<?php
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: modificar.php)\n";
  exit;
}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
  //include "header_alumno.php";
  include "../sesiones.php";
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Reporte diario</h2>
  </center>
  <?php
  //$usuario = $_SESSION['usuario'];

  //SELECT nombregrupo FROM alumno WHERE idalumno ='1234'
  /****************************** NOMBRE GRUPO *****************************************/
  $sql_nombreg = "SELECT nombregrupo FROM alumno WHERE idalumno ='$alumno'";
  $result0 = pg_query($dbconn, $sql_nombreg);
  if (!$result0) {
    echo "Ocurrió un error con query (Archivo: reporte_diario_alumno.php, nombreg).\n";
    exit;
  }

  $row0 = pg_fetch_array($result0);
  $nombre_grupo = $row0['nombregrupo'];

  /****************************** DPI MAESTRO *****************************************/
  $sql_dpi = "SELECT dpi FROM maestro WHERE nombreg = '$nombre_grupo'";
  $result = pg_query($dbconn, $sql_dpi);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: reporte_diario_alumno.php, dpi).\n";
    exit;
  }

  $row1 = pg_fetch_array($result);
  $dpi = $row1['dpi'];

  /*SELECT actividad, observacion, fecha, calificacion
  FROM reporte WHERE idalumno='1234' AND tiporeporte='D' AND dpi=3102021*/
  /****************************** REPORTE DIARIO *****************************************/
  $sql_diario = "SELECT actividad, observacion, fecha, calificacion
              FROM reporte WHERE idalumno='$alumno' AND tiporeporte='D' AND dpi=$dpi";
  $result2 = pg_query($dbconn, $sql_diario);
  if (!$result2) {
    echo "Ocurrió un error con query (Archivo: reporte_diario_alumno.php, diario).\n";
    exit;
  }

  ?>
  <center>
  <table id="calendarizacion_alumno">
    <thead>
      <th>
        Fecha
      </th>
      <th>
        Actividad
      </th>
      <th>
        Observacion
      </th>
      <th>
        Calificacion
      </th>
    </thead>
    <tbody>
      <?php
          while ($row2 = pg_fetch_array($result2)) {
            $actividad = $row2['actividad'];
            $observacion = $row2['observacion'];
            $fecha = $row2['fecha'];
            $calificacion = $row2['calificacion'];
        ?>
      <tr>
        <td>
          <?php
            echo $fecha;
          ?>
        </td>
        <td>
         <?php
            echo $actividad;
         ?>
        </td>
         <td>
           <?php
              echo $observacion;
           ?>
         </td>
         <td>
           <?php
           $i = 0;
            while ($i < $calificacion) {
              ?>
              ★
              <?php
              $i = $i+1;
            }
           ?>
         </td>
      </tr>
      <?php
          }
        ?>
    </tbody>
    </table>
  </center>

</body>
</html>
