<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: eliminar.php)\n";
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
    <h2 class = "bienvenido__tutor">Eventos</h2>
  </center>
  <?php
    $evento = "SELECT fechahora,descripcion FROM calendario";
    $query = pg_query($dbconn,$evento);
    if (!$query) {
      echo "Ocurrió un error con query (Archivo: eliminar.php, select evento).\n";
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
        Descripción
      </th>
      <th>
        Opciones
      </th>
    </thead>
    <tbody>
      <?php
          while ($row = pg_fetch_array($query)) {
            $fechahora = $row['fechahora'];
            $descripcion = $row['descripcion'];
        ?>
      <tr>
        <td>
          <?php
            echo $fechahora;
          ?>
        </td>
        <td>
         <?php
            echo $descripcion;
         ?>
        </td>
         <td><a href="eliminar_evento.php?fechahora=<?php echo $fechahora; ?>&descripcion=<?php echo $descripcion; ?>">Eliminar evento</a></td>
      </tr>
      <?php
          }
        ?>
    </tbody>
    </table>
  </center>

</body>
</html>
