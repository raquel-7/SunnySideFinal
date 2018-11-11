<?php
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: ver_reporteB.php)\n";
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
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Reportes bimestrales de <?php echo $nalumno;?></h2>
  </center>
  <?php

  if (isset($_POST['bimestre'])) {
    $bimestre = $_POST['bimestre'];
  ?>
  <form action= "reporte_bimestral_alumno.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>" method="post">
    <select name ="bimestre" class="login-input">
      <option selected disabled>Seleccione un bimestre</option>
      <option value="1">Primer Bimestre</option>
      <option value="3">Segundo Bimestre</option>
      <option value="5">Tercer Bimestre</option>
      <option value="7">Cuarto Bimestre</option>
      <option value="9">Quinto Bimestre</option>
    </select>
      <input type="submit" value="Siguiente" class="siguiente-button">
  </form>
  <?php
  if ($bimestre == 1) {
  ?>
  <center><h3>ENERO - FEBRERO</h3></center>
  <?php
  }elseif ($bimestre == 3) {
  ?>
  <center><h3>MARZO - ABRIL</h3></center>
  <?php
  }elseif ($bimestre == 5) {
  ?>
  <center><h3>MAYO - JUNIO</h3></center>
  <?php
  }elseif ($bimestre == 7) {
  ?>
  <center><h3>JULIO - AGOSTO</h3></center>
  <?php
  }elseif ($bimestre == 9) {
  ?>
  <center><h3>SEPTIEMBRE - OCTUBRE</h3></center>
  <?php
  }
  /*SELECT * FROM reporte WHERE idalumno = '1234' AND tiporeporte='B'
  AND (EXTRACT(MONTH FROM fecha) = 9 OR EXTRACT(MONTH FROM fecha) = 10)*/
  $sql_bimestre = "SELECT * FROM reporte WHERE idalumno = '$alumno' AND tiporeporte='B'
                   AND (EXTRACT(MONTH FROM fecha) = $bimestre OR EXTRACT(MONTH FROM fecha) = $bimestre+1)";
  $result = pg_query($dbconn, $sql_bimestre);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: reporte_bimestral_alumno.php, bimestre).\n";
    exit;
  }

  ?>
  <center>
  <table id="calendarizacion_alumno">
    <thead>
      <th>
        Curso
      </th>
      <th>
        Observación
      </th>
      <th>
        Calificación
      </th>
    </thead>
    <tbody>
      <?php
          while ($row1 = pg_fetch_array($result)) {
            $curso = $row1['actividad'];
            $observacion = $row1['observacion'];
            $calificacion = $row1['calificacion'];
        ?>
      <tr>
        <td>
          <?php
            echo $curso;
          ?>
        </td>
        <td>
         <?php
            echo $observacion;
         ?>
        </td>
         <td>
           <?php
              echo $calificacion;
           ?>
         </td>
      </tr>
      <?php
          }
        ?>
    </tbody>
    </table>
  </center>
  <?php
  }else {
  ?>
  <form action= "reporte_bimestral_alumno.php?alumno=<?php echo base64_encode($alumno);?>&nombre=<?php echo base64_encode($nalumno);?>" method="post">
    <select name ="bimestre" class="login-input">
      <option selected disabled>Seleccione un bimestre</option>
      <option value="1">Primer Bimestre</option>
      <option value="3">Segundo Bimestre</option>
      <option value="5">Tercer Bimestre</option>
      <option value="7">Cuarto Bimestre</option>
      <option value="9">Quinto Bimestre</option>
    </select>
      <input type="submit" value="Siguiente" class="siguiente-button">
  </form>

  </center>
  <?php
  }
  //SELECT * FROM calendario WHERE EXTRACT(MONTH FROM fechahora) = 09
  ?>

</body>
</html>
