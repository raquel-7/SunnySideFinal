 <!DOCTYPE html>
<html lang="en" dir="ltr">
<!DOCTYPE html>
<html>
<style>


<?php
include '../../css/estilos.css';
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
    width: 100%;
    background-color: #ff8c8c;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #f69f9f;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>

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
  <form action="formularioscript.php" method="post" enctype="multipart/form-data">
    <div class="rowgaleria" >

        <h1>  <a href="../index.php" class="logo"><img src="../../img/SunnySide-icon.png" width = "15%" ></a>
Crear Grupo</h1>
          <br> <br> <label>Nombre de grupo:</label>
              <input type="text"  name="nombreGrupo"><br>

          </div>
      <input type="submit" class="siguiente-button" value="Agregar" name="submit">
  </form>

</body>

</html>
