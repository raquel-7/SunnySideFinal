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
include '../maestro/tool.css'; ?>
@import url('https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:400,500');
@import url('https://fonts.googleapis.com/css?family=Pacifico');



  .login {
    margin: 20px auto;
    width: 400px;
    padding: 30px 25px;
    background: white;
    border: 1px solid #c4c4c4;
  }

  h1.login-title {
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
  h5.login-title {
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
  label.login-title{
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

  .login-input {
    width: 90%;
    height: 50px
    margin-bottom: 25px;
    margin-left: 30px;
    padding-left: 30px;
    font-size: 15px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;

  }

  .login-input:focus {
      border-color:#6e8095;
      outline: none;
    }
  .login-button {
    width: 50%;
    height: 50px;
    padding: 0;
    font-size: 20px;
    color: #fff;
    text-align: center;
    background: #1eb19d;
    border: 0;
    border-radius: 5px;
    cursor: pointer;
    outline:0;
  }



*{
  box-sizing: border-box;
}

img{
  display: block;
  max-width: 100%;
}

body{
  margin: 0;
  font-family: 'Encode Sans Semi Condensed', sans-serif;
}

h1{
  font-family: 'Pacifico', cursive;
  letter-spacing: 1.5px;
}

h2{
  font-family: 'Pacifico', cursive;
  letter-spacing: 1.5px;
}

h3{
  font-family: 'Encode Sans Semi Condensed', sans-serif;
}


.bienvenido__tutor{
  margin-top: 100px;
  z-index: -1000px;
}

/******************************Estilos del header******************************/
.header{
  height: 68px;
}

.header .contenedor{
  display: flex;
  justify-content: space-between;
}

.logo, .icon-menu{
  margin: 5px;
}

.icon-menu{
  display: block;
  width: 40px;
  height: 40px;
  font-size: 30px;
  background: #F9CCBE;
  color: #FFFFFF;
  text-align: center;
  line-height: 45px;
  border-radius: 5px;
  margin-left: auto;
  cursor: pointer;
}
/******************************Estilos del menu******************************/
.nav {
  position: absolute;
  top: 150px;
  left: -100%;
  width: 100%;
  transition: all 0.4s;
}

.menu{
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu__link{
  display: block;
  padding: 15px;
  background: #F9CCBE;
  text-decoration: none;
  color: #FFFFFF
}

.menu__link:hover, .select{
  background: #8C8C8C;
  color: #FFFFFF;
}

.mostrar{
  left: 0;
}

.menu li ul{
  list-style: none;
  display:none;
  position:absolute;
  min-width: 140px;
}

.menu li:hover > ul{
  display: block;
}


/******************************Estilos del banner******************************/

.banner{
  margin-top: 230px;
  position: relative;
  z-index: -1000;
  margin-bottom: 20px;
}

.banner .contenedor{
  position: absolute;
  top: 12%;
  left: 50%;
  transform: translateX(-50%) translateY(-50%);
  width: 100%;
  text-align: center;
}

.banner__txt{
  display: none;
}

/******************************Estilos del footer******************************/
.footer{
  margin-top: 30px;
  background: #8C8C8C;
  color: #FFFFFF;
  padding: 10px;
  text-align: center;
}

.footer .social [class^="icon-"]{
  display: inline-block;
  color: #8C8C8C;
  text-decoration: none;
  font-size: 30px;
  padding: 10px;
  background: #FFFFFF;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  line-height: 40px;
}

/******************************Estilos responsive******************************/
 @media (min-width:480px) {
   .logo{
     font-size: 40px;
   }

   .banner__titulo{
     font-size: 30px;
     margin: 5px 0;
   }

   .banner__txt{
     display: block;
     font-size: 18px;
     margin: 5px 0;
   }

   .footer .social [class^="icon-"] {
      margin: 0 10px;
    }
 }

 @media (min-width:768px) {
    .banner__titulo{
      font-size: 50px;
    }
 }

 @media (min-width:1024px){
   /*.contenedor{
     width: 1000px;
   }*/
   .nav{
     position: static;
     width: auto;
   }

   .icon-menu{
     display: none;
   }

   .menu{
     display: flex;
   }

   .menu__link{
     font-size: 20px;
   }

   .banner__txt{
     font-size: 19px;
   }
 }

 @media (min-width:1280px){
   .contenedor{
     width: 1200px;
   }
 }
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
  <div class="rowgaleria" >
    <div class="columngaleria"style="background-color:white;" align=center;>

          <div class="tooltip" ><h1 align= "center">Enviar Correo electrónico a Encargado</h1>
            <span class="tooltiptext">Esta función es para <br> agragar a un nuevo maestro</span>
          </div>

         <form class="login" action= "agregaraTutor.php" method="post">
             <h5 class="login-title">Crea un cuenta</h5><i style="font-size:24px" class="fa">&#xf05a;</i>
             <label class="login-title">Dirección de correo electrónico:</label><br>
             <input type="text" name="email" class="login-input"><br>
          <button type="submit" class = "login-button">Enviar</button>
         </form>
    </div>
    <div class="columngaleria"  style="background-color:white;">
        <h1 align= "center">Lista de Encargado</h1>
      <?php
      include 'function.php';
      displayTable("tutor");
      ?>
    </div>
  </div>
  <script src="../../js/menu.js"></script>
</body>

</html>
