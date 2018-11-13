<!DOCTYPE html>
<html lang="" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<style media="screen">
	table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	padding: 8px;
	text-align: left;
	border-bottom: 1px solid #ddd;

}

tr:hover {background-color:	#1eb19d;}
	</style>
	<body>
		<?php
	session_start();
		function displayTable($table){
			$_SESSION["table"] = $table;



		  $host="localhost";
		  $user="postgres";
		  $pass="123abc";
		  $dbname="SUNNYSIDE";
		  $dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

		  if (!$dbconn) {
		    echo "Ocurrió un error con la conexion .\n";
		    exit;
		  }
		    $primaryKeys = array("maestro" => "dpi", "tutor" => "dpi", "alumno" => "idalumno" );
		    $primaryKey = $primaryKeys[$table];
		    $sql = "SELECT * FROM $table";
		    $result = pg_query($dbconn, $sql);
		    $cont = 0;
		    $size = 0;
		    echo '<table align="center"  >';
		    while ($row = pg_fetch_assoc($result)){

		      if ($cont ==0){
		          echo "<thead><tr> ";
		      foreach ($row as $key => $value) {
		      	$size = $size + 1;
		          echo  " <th style= '  height: 25px; background-color: 	#1eb19d;'>$key</th>";
		        }


		        echo "</tr>
		      </thead>
		      <tbody>";
		      $cont =1;
		     }

		      echo "<tr>";
					//print_r($_SESSION);
							$_SESSION["size"] = $size;


		      foreach ($row as $key => $value) {
		        echo "<td>$value </td>";
		     }

		     echo "</tr>";
			}



			echo "  </tbody>
		     </table>";

		}

		?>

	</body>
</html>
