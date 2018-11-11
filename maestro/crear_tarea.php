<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: crear_reporteD.php)\n";
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
  <?php
    $usuario = $_SESSION['usuario'];

    /***************************** NOMBREG **************************************/
    $sql_nombreg = "SELECT nombreg FROM maestro WHERE username = '$usuario'";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: crear_tarea.php, nombreg).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombreg = $row2['nombreg'];

    /***************************** INFO ALUMNO *********************************/
    $sql_alumno = "SELECT idalumno, nombrea FROM alumno WHERE nombregrupo = '$nombreg'";
    $result3 = pg_query($dbconn, $sql_alumno);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: crear_tarea.php, info alumno).\n";
      exit;
    }

    /***************************** INFO CURSOS *********************************/
    $sql_curso = "SELECT idcurso,nombrec FROM curso WHERE nombregrupo = '$nombreg'";
    $result4 = pg_query($dbconn, $sql_curso);
    if (!$result4) {
      echo "Ocurrió un error con query (Archivo: crear_tarea.php, info curso).\n";
      exit;
    }

  ?>
  <center>
    <h2 class = "bienvenido__tutor">Crear tarea</h2>
  </center>
  <br>
  <form action= "creando_tarea.php" method="post">
    <center>
      <label>FECHA DE ENTREGA:</label>
      <input type="date" class="login-input" name="fechahora" placeholder=" Fecha y hora" autofocus required="">
      <br>
      <label>CURSO: </label>
      <select name ="idcurso" class="login-input">
        <option selected disabled>Seleccione un curso</option>
        <?php
            while ($row4 = pg_fetch_array($result4)) {
              $idcurso = $row4['idcurso'];
              $nombrec = $row4['nombrec'];
          ?>
        <option value="<?php echo $idcurso;?>"><?php echo $nombrec;?></option>
        <?php
            }
        ?>
      </select>
      <br>
      <label>DESCRIPCIÓN: </label>
      <input type="text" class="login-input" name="descripcion" placeholder=" Descripción" autofocus required="">
      <br>
      <input type="submit" value="Siguiente" class="siguiente-button">
    </center>
  </form>
</body>
</html>
