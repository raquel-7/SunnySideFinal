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
<body>
<script src="../js/menu.js"></script>
  <?php
  include "header_maestro.php";
  ?>
  <?php
  include "../sesiones.php";
  $usuario = $_SESSION['usuario'];

  $idalumno = base64_decode($_GET['idalumno']);
  $nombrea = base64_decode($_GET['nombrea']);
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Reportes bimestrales de <?php echo $nombrea;?></h2>
  </center>
  <?php

  if (isset($_POST['bimestre'])) {
    $bimestre = $_POST['bimestre'];
  ?>
  <form action= "ver_reporteB_maestro.php?idalumno=<?php echo base64_encode($idalumno);?>&nombrea=<?php echo base64_encode($nombrea);?>" method="post">
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
  $sql_bimestre = "SELECT * FROM reporte WHERE idalumno = '$idalumno' AND tiporeporte='B'
                   AND (EXTRACT(MONTH FROM fecha) = $bimestre OR EXTRACT(MONTH FROM fecha) = $bimestre+1)";
  $result = pg_query($dbconn, $sql_bimestre);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: ver_reporteB.php, bimestre).\n";
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
      <th>
        Opciones
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
         <td><a href="modificando_reporteB.php?idalumno=<?php echo base64_encode($idalumno);?>&nombrea=<?php echo base64_encode($nombrea);?>&curso=<?php echo base64_encode($curso);?>&bimestre=<?php echo base64_encode($bimestre);?>">Modificar</a></td>
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
  <form action= "ver_reporteB_maestro.php?idalumno=<?php echo base64_encode($idalumno);?>&nombrea=<?php echo base64_encode($nombrea);?>" method="post">
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
