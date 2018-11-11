<?php
//include "../sesiones.php";
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
<head><title>Subir Foto</title></head>
<body>
  <?php

  include "header_maestro.php";

  ?>
<h2 style="margin-top: 100px; text-align: center;"> Agregar imagen a la galeria de fotos</h2>
<form enctype="multipart/form-data" action="subir.php" method="POST">
    <div class="rowgaleria" >
      <div class="columngaleria"style="background-color:white;" align=center;>
      <label style="margin-left: 5%">    Selecciona la imagen: </label>
          <input style="margin-left:5%; margin-top:10%;"class="inputgaleria" onchange="showMyImage(this)" type="file" name="fileToUpload" id="fileToUpload"><br>
      <label style="margin-left: 5%">    Descripción de imagen:            </label><input style="margin-left: 25px" type="text" class="inputgaleria" name="descripcion" placeholder="Descripción"><br>
          <input type="submit" class="siguiente-button" value="Subir Imagen" name="submit">
      </div>
      <div class="columngaleria"  style="background-color:white;">

        <img onerror="this.onerror=null;this.src='https://cdn.onlinewebfonts.com/svg/img_98883.png';" id="thumbnil" style="width:50%; margin-left: 100px; margin-top:10%;"  src="" alt="image"/>
      </div>
    </div>
</form>
</body>
<script src="../js/menu.js"></script>
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
