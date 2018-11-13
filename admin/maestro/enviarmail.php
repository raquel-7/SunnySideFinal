<html lang="es">
<head>
  <meta charset="utf-8">
  <title>SunnySide</title>
  <meta name="viewport" content="width=device=width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
<?php include '../../css/estilos.css';
include 'tool.css';
include 'this.css'; ?>
@import url('https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:400,500');
@import url('https://fonts.googleapis.com/css?family=Pacifico');




</style>
<header>
  <?php
include 'header-admin.php';

//UPDATE usuarios SET contraseña = 'contrasena1' WHERE username = 'nombre' AND email = 'nombre@gmail.com';

   ?>
</header>
<body>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
  <div class="rowgaleria" >
    <div class="columngaleria"style="background-color:white;" align=center;>

          <div class="tooltip" ><h1 align= "center">Enviar Correo electrónico a Maestro</h1>
            <span class="tooltiptext">Esta función es para <br> agragar a un nuevo maestro</span>
          </div>

         <form class="login" action= "agregaraMaestro.php" method="post">
             <h5 class="login-title">Crea un cuenta</h5><i style="font-size:24px" class="fa">&#xf05a;</i>
             <label class="login-title">Dirección de correo electrónico:</label><br>
             <input type="text" name="email" class="login-input"><br>
          <button type="submit" class = "login-button">Enviar</button>
         </form>
    </div>
    <div class="columngaleria"  style="background-color:white;">
        <h1 align= "center">Lista de Maestros</h1>
      <?php
      include 'function.php';
      displayTable("maestro");
      ?>
    </div>
  </div>
  <script src="../../js/menu.js"></script>
</body>


</html>
