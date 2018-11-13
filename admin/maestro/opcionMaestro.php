
<html>
<head>
  <title>SunnySide</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
  <style media="screen">
  .recuadro {

    margin: 40px auto;
    width: 400px;
    padding: 30px 25px;
    background: white;
    border: 1px solid #c4c4c4;
  }
  .body img {
    float: left;

    width: 100px;
    height: 100px;

  }

  h1.recuadro-title {
    font-family: Poppins-Regular, sans-serif;
    margin: -28px -25px 25px;
    padding: 15px 25px;
    line-height: 30px;
    font-size: 25px;
    font-weight: 300;
    color: #ADADAD;
    text-align:center;
    background: #f7f7f7;
  }
  h5.recuadro-title {
    font-family: Poppins-Regular, sans-serif;
    margin: -28px -25px 25px;
    padding: 15px 25px;
    line-height: 30px;
    font-size: 15px;
    font-weight: 300;
    color: black;
    text-align:center;
    background: white;


  }
  .irlogin-button {
    width: 100%;
    height: 50px;
    padding: 0;
    font-size: 20px;
    color: #fff;
    text-align: center;
    background: #ab0000;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
    outline:0;
  }
  .irregistro-button {
    width: 100%;
    height: 50px;
    padding: 0;
    font-size: 20px;
    margin-top: 10px;
    color: #fff;
    text-align: center;
    background: #ab0000;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
    outline:0;
  }
  .tooltip {
      position: relative;
      display: inline-block;
      border-bottom: 1px dotted black;
  }

  .tooltip .tooltiptext {
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;

      /* Position the tooltip */
      position: absolute;
      z-index: 1;
  }

  .tooltip:hover .tooltiptext {
      visibility: visible;
  }

  </style>

<body>
  <?php
  include "header-admin.php";
?>
  <div style="margin-top: 150px;">
    <h2 align="center"></h2>
    <form action="opcion.php" method="post">
      <h1>Maestros SunnySide</h1>
      <div >
        <div class="tooltip">
          <button class="irlogin-button" name="mod" value = "ingresar" type="submit">Enviar Nuevo Correo Electrónico</button>
          <span class="tooltiptext">Está opción es para realizar <br> el registro de un nuevo Maestro</span>
        </div>

      </div>
      <div >

          <div class="tooltip">
              <button class="irregistro-button" name= "mod" value = "verlista" type="submit">Ver Maestros </button>
            <span class="tooltiptext">Está opción es para ver la lista <br> de Maestros de SunnySide</span>
          </div>
      </div>
  </div>
</body>
</html>
