<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>USUARIO VALIDADO CORRECTAMENTE</title>

<style>
  body{
    background-color: aquamarine;
  }
  #boton{
    padding:20px;
    font-size: 20px;
    background-color: blueviolet;
    color: white;
  }
  ul{
    width: 50%;
    background-color: aqua;
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin: 0;
    padding: 0;
    margin: auto;
    height: 35px;
  }
  ul li{
    margin: 0;
    padding: 0;
    list-style: none;
    width: 30%;
    text-align: center;
  }
  a{
    text-decoration: none;
    display: inline-block;
    padding: 5px 5px;
    font-size: 20px;
    font-weight: bold;
    color: #292227;
    box-sizing: border-box;
  }
  a:hover{
    background-color: blue;
    color: #E7BDD3;
    transform: scale(1.2);
    transition: 300ms;
  }
  #imagen{
    margin: 0 auto;
    width:600px;
    margin-top: 2rem;
  }
  img{
    width:600px;
    height:300px;
    border: 2px dotted navy;
  }

</style>


</head>
<body>

  <?php

  session_start();
  if(!isset($_SESSION["usuario"])){
      header("Location:Formulario_login.html");
  }

  ?>

  <h1 style="color:darkblue">BIENVENIDO A LA PAGINA __UNO__</h1>


  <?php
  echo "<h3 style='color:navy'>Bienvenido/a " . $_SESSION["usuario"] . ".</h3><br>";
  ?>

<div>
  <ul>
    <li><a href="registrado_correctamente.php">INICIO</a></li>
    <li><a href="pagina2.php">Página 2</a></li>
    <li><a href="pagina3.php">Página 3</a></li>
  </ul>
</div><br>
<div id="imagen">

  <img src="img/1.jpg" alt="Foto del mar">

</div>


  <a href="cerrar_sesion.php"><input type="button" value="CERRAR SESIÓN" id="boton"></a>


</body>
</html>