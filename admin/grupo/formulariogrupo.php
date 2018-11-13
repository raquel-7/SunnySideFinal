
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
include '../maestro/tool.css';
include '../maestro/this.css'; ?>
@import url('https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:400,500');
@import url('https://fonts.googleapis.com/css?family=Pacifico');




</style>
<header>
  <?php
include '../maestro/header-admin.php';

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


          <form action="formularioscript.php" method="post" enctype="multipart/form-data">

        <h1 align='center'>Crear Grupo</h1>
                  <br> <br> <label>Nombre de grupo:</label>
                      <input class="login-input" type="text"  name="nombreGrupo"><br>


              <input type="submit" class="siguiente-button" value="Agregar" name="submit">
          </form>
    </div>
    <div class="columngaleria"  style="background-color:white;">
        <h1 align= "center">Lista de Grupos</h1>
      <?php
      include 'function.php';
      displayTable("grupo");
      ?>
    </div>
  </div>
  <script src="../../js/menu.js"></script>
</body>


</html>
