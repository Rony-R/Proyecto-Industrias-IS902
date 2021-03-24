<?php 
    session_start();
    if (!isset($_SESSION["usr"]) || !isset($_SESSION["psw"]))
        header("Location: login.php");
    include("class/class-conexion.php");
    $conexion = new Conexion();
     $sql = sprintf( 
        "SELECT id_usuario, nombre, apellido, correo, contrasenia FROM tbl_usuario WHERE correo = '%s' and contrasenia = '%s' and id_usuario = %s",
        $_SESSION["usr"],
        $_SESSION["psw"],
        $_SESSION["idUsr"]);
    //echo $sql;
    //exit;
    $resultado = $conexion->ejecutarConsulta($sql); $respuesta = array(); if
($conexion->cantidadRegistros($resultado)<=0){ header("Location: login.php"); }
$registro = $conexion->obtenerFila($resultado); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap 4 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/nav.css" />

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>

    <title>Publicaciones</title>
  </head>
  <body>

  <nav>
      <!-- NavBar sin login -->
      <ul id="nav-no-login" class="menu mb-0" style="display: none">
        <li class="logo">
          <a href="#">
            <img class="logoImg" src="./img/logos/logo1.png" alt="" />
          </a>
        </li>
        <li class="item"><a href="index.php">Inicio</a></li>
        <li class="item button log"><a href="registro.html">Registrarse</a></li>
        <li class="item button">
          <a id="h" href="login.php"> Iniciar Sesión </a>
        </li>
        <li class="toggle">
          <span class="bars"></span>
        </li>
      </ul>

      <!-- NavBar freelancer -->
      <ul id="nav-freelancer" class="menu mb-0" style="display: none">
        <li class="logo">
          <a href="#">
            <img class="logoImg" src="./img/logos/logo1.png" alt="" />
          </a>
        </li>
        <li class="item"><a href="index.php">Inicio</a></li>
        <li class="item"><a href="perfil-info-personal.html">Perfil</a></li>
        <li class="item button log">
          <a href="ajax/logout.php">Cerrar Sesión</a>
        </li>
        <li class="item button">
          <a id="h" href="publicaciones.php"> Publicaciones </a>
        </li>
        <li class="toggle">
          <span class="bars"></span>
        </li>
      </ul>

      <!-- NavBar Empresa -->
      <ul id="nav-empresa" class="menu mb-0">
        <li class="logo">
          <a href="#">
            <img class="logoImg" src="./img/logos/logo1.png" alt="" />
          </a>
        </li>
        <li class="item"><a href="index.php">Inicio</a></li>
        <li class="item"><a href="perfil-info-personal.html">Perfil</a></li>
        <li class="item"><a href="ajax/logout.php">Cerrar Sesión</a></li>
        <li class="item button log"><a href="#">Mis Publicaciones</a></li>
        <li class="item button">
          <a id="h" href="pubProyecto.php"> Publicar un Proyecto </a>
        </li>
        <li class="toggle">
          <span class="bars"></span>
        </li>
      </ul>
    </nav>

    <main>
      <!-- <h3 class="text-center">Contenido Principal</h3> -->

      <div class="container">
        <div id="row-pubs" class="row mt-2 mb-2"></div>
      </div>
    </main>

    <footer class="text-center text-lg-start">
      <div class="row">
        <div class="col-md-4 text-light">
          <img class="logoFoot" src="./img/logos/logo1.png" alt="" />
        </div>

        <div class="col-md-8">
          <h3 class="text-light text-center pt-3 mb-4">Desarrolladores</h3>
          <div class="row">
            <div class="col-md-4">
              <img
                class="creatorImg"
                src="img/logos/prof.jpeg"
                alt="Andres Lizardo"
              />
              <p class="text-light">Andres Lizardo</p>
            </div>
            <div class="col-md-4">
              <img
                class="creatorImg"
                src="img/logos/prof.jpeg"
                alt="Jheral Blanco"
              />
              <p class="text-light">Jheral Blanco</p>
            </div>
            <div class="col-md-4">
              <img
                class="creatorImg"
                src="img/logos/prof.jpeg"
                alt="Josue Lanza"
              />
              <p class="text-light">Josue Lanza</p>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
              <img
                class="creatorImg"
                src="img/logos/prof.jpeg"
                alt="Rafael Bautista"
              />
              <p class="text-light">Rafael Bautista</p>
            </div>
            <div class="col-md-4">
              <img
                class="creatorImg"
                src="img/logos/prof.jpeg"
                alt="Rony Rodriguez"
              />
              <p class="text-light">Rony Rodriguez</p>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="footRow text-center text-light p-2">
          © 2020 Copyright:
          <a class="text-light" href="https://www.unah.edu.hn/"
            >UNAH - www.unah.edu.hn</a
          >
        </div>
      </div>
    </footer>

    <script src="js/nav.js" type="text/javascript"></script>
  </body>
</html>
