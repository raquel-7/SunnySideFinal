<html lang="es">
<head>
  <meta charset="utf-8">
  <title>SunnySide</title>
  <meta name="viewport" content="width=device=width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css">
  <link href="https://file.myfontastic.com/T7nMioqYzUpynQCWqZ2uDE/icons.css" rel="stylesheet">
</head>
<style>
@import url('https://fonts.googleapis.com/css?family=Encode+Sans+Semi+Condensed:400,500');
@import url('https://fonts.googleapis.com/css?family=Pacifico');

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
<header class="header">

  <div class="contenedor">
    <a href="tutor.php" class="logo"><img src="../img/SunnySide-icon.png" width = "200px" height="150px"></a>

  </div>

</header>
<script src="js/menu.js"></script>
</body>
</html>
