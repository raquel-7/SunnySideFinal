
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

    $nombreGrupo = $_POST['nombreGrupo'];


    $query = "INSERT INTO grupo VALUES('$nombreGrupo', 0)";

    $send = pg_query($dbconn, $query);
    echo "<script type='text/javascript'> window.open('../index.php','_self');</script>";

    ?>
