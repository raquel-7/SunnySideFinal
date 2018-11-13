 <!DOCTYPE html>
<html lang="en" dir="ltr">
<!DOCTYPE html>
<html>
<style>

<?php
include '../../css/estilos.css';
include '../maestro/tool.css';
 ?>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 50%;
    margin-left: 20%;
    background-color: #ff8c8c;
    color: white;
    padding: 14px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #f69f9f;
}

div {
    border-radius: 5px;
    background-color:white;
    padding: 20px;
}
</style>
<header>

<?php include '../maestro/header-admin.php'; ?>
</header>
<body>



<div>
  <?php
  session_start();

  $host="localhost";
  $user="postgres";
  $pass="123abc";
  $dbname="SUNNYSIDE";
  $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

  if (!$dbconn) {
    echo "Ocurrió un error con la conexion .\n";
    exit;
  }
  $nombre = $_GET['username'];
  $email = $_GET['email'];   ?>


    <h1 align ="center"> Formulario Alumno</h1>
<a  style="margin-left:80%;" href="listado.php"><img class="tooltip" src="../../img/teddy-bear.png" alt="Ver Listado de Alumnos"> </a>


    <br>
    <br>
    <br>
  <form action="formularioscript.php" method="post" enctype="multipart/form-data">
    <div class="rowgaleria" >
      <div class="columngaleria"style="background-color:white;" align=center;>

          <br>  <label>Año Escolar:</label>
            <select name="anio">
              <?php
                    $year = date('Y');
                    $min = $year;
                    $max = $year + 15;
                    for( $i=$max; $i>=$min; $i-- ) {
                      echo '<option value='.$i.'>'.$i.'</option>';
                    }
                  ?>

            </select>
          <br> <br> <label>Tutor a cargo:</label>  <select name="tutor">
              <option selected>Seleccione un tutor </option>
                <?php
                $product = "SELECT dpi, nombret FROM tutor";
                $product_array = pg_query($dbconn, $product);
                while ($row = pg_fetch_assoc($product_array)){

                      $nombret= $row['nombret'];
                      $dpi = $row['dpi'];
                ?>

                  <option value="<?php echo $dpi; ?>"><?php echo $dpi; ?>- <?php echo $nombret; ?></option>


                    <?php

                    }
                    ?>
              </select>

              <label >Nombre Completo</label>
              <input type="text"  name="nombreAlumno"><br>
            <br>  <label >Fecha De Nacimiento</label><br>
              <input type="date" name="fecha" placeholder="DD-MM-AAAA"><br><br>

            <br>  <label>Nombre del Grupo:</label> <select name="grupo">
                <?php
                $nogrupo = "SELECT * FROM grupo";
                $res = pg_query($dbconn, $nogrupo);
                while ($row = pg_fetch_assoc($res)){

                      $nombregrupo= $row['nombregrupo'];
                      $cantidad = $row['cantidad'];
                      echo $cantidad;
                      if($cantidad >= '20'){
                        ?>
                          <option value="<?php echo $nombregrupo; ?>" disabled ><?php echo $nombregrupo;?> - CUPO LLENO</option>
                <?php  }else{
                ?>

                  <option value="<?php echo $nombregrupo; ?>"><?php echo $nombregrupo; ?></option>


                    <?php
                  }
                }
                    ?>

              </select>
            </div>
            <div class="columngaleria"  style="background-color:white;">
              <label style="margin-left: 5%">    Selecciona la imagen: </label>
                <input style="margin-left:5%; margin-top:10%;"class="inputgaleria" onchange="showMyImage(this)" type="file" name="fileToUpload" id="fileToUpload"><br>
              <img onerror="this.onerror=null;this.src='https://cdn.onlinewebfonts.com/svg/img_98883.png';" id="thumbnil" style="width:50%; margin-left: 100px; margin-top:10%;"  src="" alt="image"/>
            </div>
          </div>
      <input type="submit" class="siguiente-button" value="Agregar" name="submit">
  </form>

</body>
<script>
function showMyImage(fileInput) {
      var files = fileInput.files;
      for (var i = 0; i < files.length; i++) {
          var file = files[i];
          var imageType = /image.*/;
          if (!file.type.match(imageType)) {
              continue;
          }
          var img=document.getElementById("thumbnil");
          img.file = file;
          var reader = new FileReader();
          reader.onload = (function(aImg) {
              return function(e) {
                  aImg.src = e.target.result;
              };
          })(img);
          reader.readAsDataURL(file);
      }
  }

</script>
</html>
