<?php
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: mostrargaleria.php)\n";
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

<style>
a.button2galeria {
  width: 50%;
  height: 80px;
  margin-left: 70px;
  font-size: 20px;
  color: #fff;
  text-align: center;
  background: #f0776c;
  border: 0;
  border-radius: 5px;
  cursor: pointer;
  outline:0;
  margin-top: 25px;
}

* {
    box-sizing: border-box;
}

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}

</style>

<?php
  $nalumno = base64_decode($_GET['nombre']);
  $alumno = base64_decode($_GET['alumno']);
?>

<body>
  <?php
  include "header_maestro.php";
  ?>
  <div >
  <h2 style="text-align:center; margin-top:5%;">Galeria de Fotos <a href="imagen.php" ><img src="../img/photo.png" alt="Agregar Fotografía"> </a></h2>

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
