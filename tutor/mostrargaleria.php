<?php
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: calendarizacion_maestro.php)\n";
  exit;
}

?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
<style>
<?php
include "../css/estilos.css";
?>
</style>
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
  <div style="text-align:center; margin-top:5%;">
    <br>
    <br>
  <h2>Galeria de Fotos</h2>
</div>
<div class="row-mostrargaleria">
  <?php
      $query = "SELECT * FROM galeria";
      $result = pg_query($dbconn, $query);
      while ($row = pg_fetch_assoc($result)) {
        $nombre = $row['nombre'];
        $descripcion = $row['descripcion'];
        $id = $row['idImg'];
   ?>

<img id="<?php echo $id; ?>" src="../uploads/<?php echo $nombre; ?>" alt="<?php echo $descripcion; ?>" style="width:100%;max-width:300px">

<!-- The Modal -->
<div id="myModal-<?php echo $id; ?>" class="modal">
  <span class="close" id="close-<?php echo $id; ?>">&times;</span>
  <img class="modal-content" id="<?php echo $nombre; ?>" >
  <div id="caption-<?php echo $id; ?>"></div>
</div>



<script>
// Get the modal
var modal = document.getElementById('myModal-<?php echo $id; ?>');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('<?php echo $id; ?>');
var modalImg = document.getElementById('<?php echo $nombre; ?>');
var captionText = document.getElementById("caption-<?php echo $id; ?>");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src =this.src;
     captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementById("close-<?php echo $id; ?>");

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";

}
</script>
<?php
  }
  ?>

</body>
</html>
