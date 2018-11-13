<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Listado de Alumnos </title>

  </head>
  <style>
@import url(https://fonts.googleapis.com/css?family=Merriweather);

<?php
include '../../css/estilos.css';
include '../maestro/tool.css';
include 'this.css';
 ?>

  </style>
  <body>
    <header class="header_area">
      <?php
      include '../maestro/header-admin.php';

       ?>
    </header>
<h1>Listado de Alumnos</h1>
<br>
<br><br><br><br>
    <?php

      $host="localhost";
      $user="postgres";
      $pass="123abc";
      $dbname="SUNNYSIDE";
      $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

      if (!$dbconn) {
        echo "Ocurrió un error con la conexion .\n";
        exit;
      }
  echo '<table align="center"  >';

    $product = "SELECT idalumno, fotoperfil, nombrea, dpi, nombregrupo, fechanac FROM alumno";
    $product_array = pg_query($dbconn, $product);
    $cont = 0;
    $size = 0;
    echo '<table align="center"  >';
    while ($row = pg_fetch_assoc($product_array)){
      $idalumno =$row['idalumno'];
      $nombrea = $row['nombrea'];
      $fotoperfil = $row['fotoperfil'];
      $dpi = $row['dpi'];
      $grupo =$row['nombregrupo'];
      $nac= $row['fechanac'];
      if ($cont ==0){
          echo "<thead><tr> ";
      foreach ($row as $key => $value) {
        $size = $size + 1;
          echo  " <th style= '  height: 25px; background-color: #ffadad;'>$key</th>";

        }
        echo "</tr>
      </thead>
      <tbody>";
      $cont =1;
     }
      echo "<tr>";
      foreach ($row as $key => $value) {
        if($key == 'fotoperfil'){
          echo"<td><img style='width:25%;' src='pp/$fotoperfil' alt='image'/></td>";
        }else{
            echo "<td>$value </td>";
        }
     }

       echo "</tr>";
}
       			echo "  </tbody>
            </table>";
     ?>


  </body>
  <script>


  </script>
</html>
