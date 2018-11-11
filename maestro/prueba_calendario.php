<?php
include "../sesiones.php";
$host="localhost";
$user="postgres";
$pass="123abc";
$dbname="SUNNYSIDE";
$dbconn = pg_connect("host=$host dbname=$dbname user=$user password=$pass");

if (!$dbconn) {
  echo "Ocurrió un error con la conexion .\n";
  exit;
}


$db = new PDO('pgsql:host=localhost;dbname=SUNNYSIDE',$user,$pass);

$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

switch ($accion) {
  /***********************************AGREGAR************************************************/
  case 'agregar':
    // Agregar

    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, dpi,agregar).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];

    $sql_nombreg = "SELECT nombreg FROM maestro WHERE dpi =$dpi";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, nombreg,agregar).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombregrupo = $row2['nombreg'];

    $start = $_POST['start'];
    $descripcion = $_POST['descripcion'];
    $end = $_POST['end'];
    $title = $_POST['title'];
    $color = $_POST['color'];
    $textColor = $_POST['textColor'];

    $sql_insert = "INSERT INTO calendario VALUES('$start','$descripcion','$dpi','$nombregrupo','$end','$title','$color','$textColor')";
    $result3 = pg_query($dbconn, $sql_insert);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, insert).\n";
      exit;
    }

    $consulta = $db->prepare("SELECT * FROM calendario WHERE dpi = '$dpi' AND nombregrupo = '$nombregrupo'" );
    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    $fh = fopen("datos.json", 'w');
    fwrite($fh, $json);
    fclose($fh);
    break;
  /***********************************ELIMINAR************************************************/
  case 'eliminar':
    //Eliminar

    /*
    DELETE FROM calendario WHERE id = '1' AND dpi = '3102021' AND nombregrupo = 'Estrellas';
    */
    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, dpi,eliminar).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];

    $sql_nombreg = "SELECT nombreg FROM maestro WHERE dpi =$dpi";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, nombreg,eliminar).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombregrupo = $row2['nombreg'];

    $id = $_POST['id'];

    $sql_delete = "DELETE FROM calendario WHERE id = '$id' AND dpi = '$dpi' AND nombregrupo = '$nombregrupo'";
    $result3 = pg_query($dbconn, $sql_delete);
    if (!$result3) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, delete).\n";
      exit;
    }
    //SELECT * FROM calendario WHERE dpi = '$dpi' AND nombregrupo = '$nombregrupo'
    $consulta = $db->prepare("SELECT * FROM calendario WHERE dpi = '$dpi' AND nombregrupo = '$nombregrupo'" );
    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    $fh = fopen("datos.json", 'w');
    fwrite($fh, $json);
    fclose($fh);
    //echo "Instrucción eliminar";
    break;
  default:
    // code...
    $usuario = $_SESSION['usuario'];

    $sql_dpi = "SELECT dpi FROM maestro WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, dpi,default).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];

    $sql_nombreg = "SELECT nombreg FROM maestro WHERE dpi =$dpi";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: prueba_calendario.php, nombreg,default).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombregrupo = $row2['nombreg'];

    $consulta = $db->prepare("SELECT * FROM calendario WHERE dpi = '$dpi' AND nombregrupo = '$nombregrupo'" );
    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    $fh = fopen("datos.json", 'w');
    fwrite($fh, $json);
    fclose($fh);
    break;
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Calendario</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="../js/jquery.min.js"></script>
    <script src="../js/moment.min.js"></script>
    <link rel="stylesheet" href="../css/fullcalendar.min.css">
    <script src="../js/fullcalendar.min.js"></script>
    <script src="../js/es.js"></script>
    <script src="../js/bootstrap-clockpicker.js"></script>
    <link rel="stylesheet" href="../css/bootstrap-clockpicker.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
  <?php
  include "header_calendario.php";
  ?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
   <div class="row">
    <div class="col"></div>
    <div class="col-7"><br><br><div id="CalendarioWeb"></div></div>
    <div class="col"></div>
   </div>

  </div>

  <script>
   $(document).ready(function(){
          $('#CalendarioWeb').fullCalendar({
            header:{
              left:'today,prev,next',
              center: 'title',
              right: 'month,agendaWeek,agendaDay'
            },

            dayClick:function(date,jsEvent,view){
              $('#btnAgregar').prop("disabled",false);
              $('#btnEliminar').prop("disabled",true);

              limpiarFormulario();
              $("#fechai").val(date.format());
              $("#mantenimientoEventos").modal();

            },
              events:"http://localhost/Guarderia/maestro/datos.json",

            eventClick:function(calEvent,jsEvent,view){
              $('#btnAgregar').prop("disabled",true);
              $('#btnEliminar').prop("disabled",false);
              //Titulo H2
              $('#tituloEvento').html(calEvent.title);
              //Mostrar la informacion del evento en los inputs
              $('#descripcion').val(calEvent.descripcion);
              $('#idevento').val(calEvent.id);
              $('#evento').val(calEvent.title);
              $('#color').val(calEvent.color);

              FechaHora = calEvent.start._i.split(" ");
              $('#fechai').val(FechaHora[0]);
              $('#hora').val(FechaHora[1]);


              $("#mantenimientoEventos").modal();
            }

          });

        });
  </script>

  <?php /************************** MODAL PARA AGREGAR, MODIFICAR O ELIMINAR EVENTOS**********************************/ ?>
  <div class="modal fade" id="mantenimientoEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tituloEvento"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" class="login-input" id="idevento" name="idevento" placeholder=" Título" autofocus required="">
          <input type="hidden" class="login-input" id="fechai" name="fecha_inicio" placeholder=" Fecha y hora" autofocus required="">

          <div class="form-row">
            <div class="form-group col-md-8">
              <label>TITULO EVENTO:</label>
              <input type="text" class="form-control" id="evento" name="evento" placeholder=" Título" autofocus required="">
            </div>

            <div class="form-group col-md-4">
              <label>HORA:</label>

              <div class="input-group clockpicker" data-autoclose="true">
                <input type="text" class="form-control" id="hora" name="hora" value="10:30" placeholder=" Hora" autofocus required="">
              </div>

            </div>

          </div>
          <div class="form-group">
            <label>DESCRIPCIÓN: </label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" autofocus required=""></textarea>
          </div>

          <div class="form-group">
            <label>COLOR: </label>
            <input type="color" class="form-control" id="color" name="color" value="#DED2FF" style="height:36px;" autofocus required="">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
          <button type="button" id="btnEliminar" class="btn btn-danger">Borrar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    var NuevoEvento;
    $('#btnAgregar').click(function(){
      RecolectarDatosGUI();
      EnviarInformacion('agregar',NuevoEvento);
    });

    $('#btnEliminar').click(function(){
      RecolectarDatosGUI();
      EnviarInformacion('eliminar',NuevoEvento);
    });

    function RecolectarDatosGUI(){
      NuevoEvento ={
        id: $('#idevento').val(),
        title: $('#evento').val(),
        start: $('#fechai').val()+" "+$('#hora').val(),
        color: $('#color').val(),
        descripcion: $('#descripcion').val(),
        textColor:"white",
        end: $('#fechai').val()+" "+$('#hora').val()
      };
    }

    function EnviarInformacion(accion,objEvento){
      $.ajax({
        type:'POST',
        url:"prueba_calendario.php?accion="+accion,
        data:objEvento,
        success:function(){
          $('#CalendarioWeb').fullCalendar('refetchEvents');
          $("#mantenimientoEventos").modal('toggle');
        },
        error:function(){
          alert("Hay un error....");
        }
      });
    }

    $('.clockpicker').clockpicker();

    function limpiarFormulario(){
      $('#tituloEvento').html('');
      $('#idevento').val('');
      $('#evento').val('');
      $('#color').val('');
      $('#descripcion').val('');


    }

  </script>
</body>
</html>﻿
