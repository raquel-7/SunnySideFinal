 <!DOCTYPE html>
<html lang="en" dir="ltr">
<!DOCTYPE html>
<html>
<style>


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
  <h3>  <a href="../index.php" class="logo"><img src="../../img/SunnySide-icon.png" width = "15%" ></a>FORMULARIO TUTOR</h3>

  <form action="formularioscript.php" method="get">

    <label >Nombre</label>
    <input type="text"  name="nombrep">
    <label >Usuario</label>
    <input type="text"  value = "<?php echo $nombre;?>" readonly >
    <input type="hidden" name="usuario" value="<?php echo $nombre; ?>" class="login-input"><br>


    <label >Docuento Personal Identificación:</label>
    <input type="text"  name="dpi" >
    <label >Dirección</label>
    <input type="text"  name="direccion" >
    <label >Teléfono</label>
    <input type="text"  name="telefono" >
    <label >Fecha De Nacimiento</label>
    <input type="date" name="fecha" placeholder="DD-MM-AAAA">

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
