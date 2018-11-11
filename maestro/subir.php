
<?php

session_start();
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion. (Archivo: ver_reporteB.php)\n";
  exit;
}


$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$nombre = basename($_FILES["fileToUpload"]["name"]);
echo $nombre;
$descripcion = $_POST['descripcion'];


if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Lo siento, la imagen es muy grande";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "El formato de la imagen es incorrecto.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "La imagen no fue subida a la carpeta";

} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "El archivo ". basename( $_FILES["fileToUpload"]["name"]). " fue subido exitosamente.";
        $query = "INSERT INTO galeria VALUES('$nombre', '$descripcion')";
        $res = pg_query($dbconn, $query);



    } else {
        echo "Lo siento, no se pudo subir la imagen. Intenta de nuevo";
    }
}
echo '<script type="text/javascript"> window.open("imagen.php","_self");</script>';
?>
