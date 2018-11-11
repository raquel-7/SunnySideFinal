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
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="../css/estilos.css" rel="stylesheet">
<body>
  <?php
  include "header_maestro.php";
  ?>
  <?php
  $usuario = $_SESSION['usuario'];

  /***************************** NOMBRE GRUPO *********************************/
  $sql_grupo = "SELECT nombreg FROM maestro WHERE username = '$usuario'";
  $result = pg_query($dbconn, $sql_grupo);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: listado_alumnos.php, grupo).\n";
    exit;
  }

  //SELECT * FROM alumno WHERE nombregrupo = 'Estrellas'
  $row1 = pg_fetch_array($result);
  $nombreg = $row1['nombreg'];

  /************************** ALUMNOS EN EL GRUPO *****************************/
  $sql_grupo = "SELECT idalumno, nombrea FROM alumno WHERE nombregrupo = '$nombreg'";
  $result = pg_query($dbconn, $sql_grupo);
  if (!$result) {
    echo "Ocurrió un error con query (Archivo: listado_alumnos.php, grupo).\n";
    exit;
  }
  ?>
  <div >
    <center>
    <h2 class = "bienvenido__tutor">Listado de alumnos</h2>
    </center>
  </div>
<div >
  <center>
  <table>
    <thead>
      <th>
        ID Alumno
      </th>
      <th>
        Alumno
      </th>
      <th>
        Opciones
      </th>
    </thead>
    <tbody>
      <?php
          while ($row2 = pg_fetch_array($result)) {
            $idalumno = $row2['idalumno'];
            $nombrea = $row2['nombrea'];
        ?>
      <tr>
        <td>
          <?php
            echo $idalumno;
          ?>
        </td>
        <td>
          <?php
            echo $nombrea;
          ?>
        </td>
        <td><a href="alumno_perfil.php?idalumno=<?php echo base64_encode($idalumno); ?>&nombrea=<?php echo base64_encode($nombrea); ?>">Ver perfil</a></td>
      </tr>
      <?php
          }
        ?>
    </tbody>
    </table>
  </center>
</div>

</body>
</html>
