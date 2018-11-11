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

//$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
$nalumno = base64_decode($_GET['nombre']);
$alumno = base64_decode($_GET['alumno']);
    $usuario = $_SESSION['usuario'];

//echo $alumno;

/*************************************** DPI tutor *********************************************/
    $sql_dpi = "SELECT dpi FROM tutor WHERE username = '$usuario'";
    $result = pg_query($dbconn, $sql_dpi);
    if (!$result) {
      echo "Ocurrió un error con query (Archivo: calendario.php, dpi).\n";
      exit;
    }

    $row1 = pg_fetch_array($result);
    $dpi = $row1['dpi'];
    //echo $dpi;

/*************************************** Nombre grupo alumno *********************************************/
    $sql_nombreg = "SELECT nombregrupo FROM alumno WHERE dpi ='$dpi' AND idalumno='$alumno'";
    $result2 = pg_query($dbconn, $sql_nombreg);
    if (!$result2) {
      echo "Ocurrió un error con query (Archivo: calendario.php, nombregrupo).\n";
      exit;
    }

    $row2 = pg_fetch_array($result2);
    $nombregrupo = $row2['nombregrupo'];

    //echo $nombregrupo;

    $consulta = $db->prepare("SELECT * FROM calendario WHERE nombregrupo = '$nombregrupo'" );
    $consulta->execute();

    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($resultado);
    $fh = fopen("datos.json", 'w');
    fwrite($fh, $json);
    fclose($fh);

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
    <link href="../css/header.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
</head>

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
  <script src="../js/menu.js"></script>
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
              limpiarFormulario();
              $("#fechai").val(date.format());
              $("#mantenimientoEventos").modal();

            },
              events:"http://localhost/Guarderia/tutor/datos.json",

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

  <?php /************************** MODAL PARA MOSTRAR EVENTOS**********************************/ ?>
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

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    var NuevoEvento;

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
