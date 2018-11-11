<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: modificar_reporteD.php)\n";
  exit;
}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="../css/estilos.css" rel="stylesheet">
<body>
  <?php
  include "header_maestro.php";
  ?>
  <center>
    <h2 class = "bienvenido__tutor">Reportes diarios</h2>
  </center>
  <?php
    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: modificar_reporteD.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];

    //SELECT * FROM reporte WHERE tiporeporte = 'D' AND dpi = 3102021
    $sql_reporte = "SELECT * FROM reporte WHERE tiporeporte = 'D' AND dpi = $dpi";
    $result2 = pg_query($dbconn, $sql_reporte);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: modificar_reporteD.php, select reporte).\n";
      exit;
    }
  ?>
  <center>
  <table border=1px>
    <thead>
      <th>
        Fecha
      </th>
      <th>
        Alumno
      </th>
      <th>
        Actividad
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
          while ($row2 = pg_fetch_array($result2)) {
            $actividad = $row2['actividad'];
            $observacion = $row2['observacion'];
            $fecha = $row2['fecha'];
            $calificacion = $row2['calificacion'];
            $idalumno = $row2['idalumno'];
        ?>
      <tr>
        <td>
          <?php
            echo $fecha;
          ?>
        </td>
        <td>
         <?php
           $sql_nombrea = "SELECT nombrea FROM alumno WHERE idalumno = '$idalumno'";
           $result3 = pg_query($dbconn, $sql_nombrea);
           if (!$result3) {
             echo "Ocurrió un error con query (Archivo: modificar_reporteD.php, nombrea).\n";
             exit;
           }

           $row3 = pg_fetch_array($result3);
           $nombrea = $row3['nombrea'];

           echo $nombrea;

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
            echo $calificacion;
          ?>
        </td>
         <td><a href="editar_reporteD.php?fecha=<?php echo base64_encode($fecha); ?>&idalumno=<?php echo base64_encode($idalumno); ?>">Modificar reporte diario</a></td>
      </tr>
      <?php
          }
        ?>
    </tbody>
    </table>
  </center>
</body>
</html>
