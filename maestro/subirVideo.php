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

echo "hola";
    $descripcion = $_GET['descripcion'];
echo $descripcion;

    $name=$_FILES['uploadvideo']['name'];
    echo $name;
     $type=$_FILES['uploadvideo']['type'];
    //$size=$_FILES['uploadvideo']['size'];
    $cname=str_replace(" ","_",$name);
    $tmp_name=$_FILES['uploadvideo']['tmp_name'];
    $target_path="../uploads/";
    $target_path=$target_path.basename($cname);
    if(isset($_GET["Enviar"])) {
    if(move_uploaded_file($_FILES['uploadvideo']['tmp_name'],$target_path))
    {
    echo $sql="INSERT INTO video VALUES ('$cname', '$descripcion', default)";
    $result=pg_query($dbconn, $sql);
    echo "Your video ".$cname." has been successfully uploaded";
    }
  }
    //echo '<script type="text/javascript"> window.open("video.php","_self");</script>';
    ?>
