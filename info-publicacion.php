<?php

  $publicacion = $_GET["publicacion"];

?>

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
    $resultado = $conexion->ejecutarConsulta($sql);
    $respuesta = array();
    if ($conexion->cantidadRegistros($resultado)<=0){
           header("Location: login.php");
    }

    $registro = $conexion->obtenerFila($resultado);

?>

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

    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/nav.css" />

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Información Publicacion</title>
  </head>
  <body>


  <span class="d-none">
    <input type="text" value="<?php echo $_SESSION["idUsr"]?>" id="txt-codigo-usuario">
    </span>
    <span class="d-none">
    <input type="text" value="<?php echo $publicacion?>" id="id-publicacion">
    </span>
    <nav>
        <!-- NavBar cuando hace login -->
        <ul id="ul-login" class="menu mb-0" style="display: none">
          <li class="logo">
            <a href="#">
              <img class="logoImg" src="./img/logos/logo1.png" alt="" />
            </a>
          </li>
          <li class="item"><a href="index.php">Inicio</a></li>
          <li class="item"><a href="perfil-info-personal.html">Perfil</a></li>
          <li class="item">
            <a id="a-publicaciones" href="publicaciones.php">Publicaciones</a>
          </li>
          <li id="a-logut" class="item">
            <a href="ajax/logout.php">Cerrar Sesión</a>
          </li>
          <li class="item button log">
            <a id="btn-empresa1" style="display: none" href="#">Mis Publicaciones</a>
          </li>
          <li class="item button">
            <a id="btn-empresa2" style="display: none" href="pubProyecto.html"> Publicar un Proyecto </a>
          </li>
          <li class="toggle">
            <span class="bars"></span>
          </li>
        </ul>

        <!-- NavBar cuando no ha hecho login -->
        <ul id="ul-no-login" class="menu mb-0">
          <li class="logo">
            <a href="#">
              <img class="logoImg" src="./img/logos/logo1.png" alt="" />
            </a>
          </li>
          <li class="item"><a href="index.php">Inicio</a></li>
          <li class="item"><a href="registro.html">Registrarse</a></li>
          <li class="item button"><a href="login.php">Iniciar Sesión</a></li>
          <li class="toggle">
            <span class="bars"></span>
          </li>
        </ul>
      </nav>

    <main class="container-fluid mt-2 mb-4">
      <div class="row">
        <div class="col-4" id="div-usuario-publicacion">
          <!--<div class="card border-primary"> Este card es para ver la información de la persona que creo la publicación
            <div class="card-header text-center">
              <h5 class="card-subtitle">Rafael Bautista</h5> 
            </div>
            <div class="card-body text-center">
              <img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">
            </div>
            <div class="card-footer">
              <table class="table table-borderless">
                <tbody>
                  <tr>
                    <td>País:</td>
                    <td>Honduras</td>
                  </tr>
                  <tr>
                    <td>Correo:</td>
                    <td>rafael.bautista1@hotmail.es</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>-->
        </div>
        <div class="col-8">
          <div class="card border-primary">
            <div class="card-header" id="div-card-title">
              <!-- <h5 class="card-title">Sistema de Facturación</h5> Aqui se asignaria el nombre del proyecto -->
            </div>
            <div class="card-body" id="div-card-info">
              <!--<p>Aqui ira una información X que el usuario tiene que detallar acerca de la información del proyecto necesaria para poder recibir ayuda o compartir el como entender el codigo</p>-->
            </div>
            <div class="card-body" id="div-pub-imagenes">
              <div class="row"> <!-- Con este Row se ordena la manera de presentar las posibles imagenes que incluya la publicación -->
                <div class="col-3"><img src="img/logos/logo1.png" class="img-thumbnail img-fluid" alt=""></div>
                <div class="col-3"><img src="img/logos/logo1.png" class="img-thumbnail img-fluid" alt=""></div>
                <div class="col-3"><img src="img/logos/logo1.png" class="img-thumbnail img-fluid" alt=""></div>
                <div class="col-3"><img src="img/logos/logo1.png" class="img-thumbnail img-fluid" alt=""></div>
              </div>
            </div>
            <div class="card-footer" style="background-color: white;">
              <div class="row">
                <div class="col-1">
                  <img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt=""> <!-- Aquí iria la imagen de perfil del usuario que inicio sesión -->
                </div>
                <div class="col-9 mt-1">
                  <input type="text" class="form-control" name="" id="txta-comentario">
                </div>
                <div class="col-2 mt-1">
                  <button class="btn btn-outline-primary" id="btn-comentarios">Comentar</button>
                </div>
              </div>
            </div>
            <div class="card-footer" id="div-comentarios">
              <!--<div class="row mb-1">
                <div class="col-1">
                  <img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="col-11">
                  <span class="card-subtitle text-primary fw-bold">Goku</span>
                  <p class="card-text">Aqui ira un comentario X con distintas lineas, distintos parrafos, con mucha información que comentar acerca de la publicación realizada</p>
                </div>
              </div>
              <hr>
              <div class="row mb-1">
                <div class="col-1">
                  <img src="img/profile-examples/goku.jpg" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="col-11">
                  <span class="card-subtitle text-primary fw-bold">Goku</span>
                  <p class="card-text">Aqui ira un comentario X con distintas lineas, distintos parrafos, con mucha información que comentar acerca de la publicación realizada</p>
                </div>
              </div>-->
            </div>
          </div>
        </div>
      </div>
        
    </main>

    <!-- <footer class="bg-dark text-center text-lg-start">
      <div
        class="text-center text-light p-3"
        style="background-color: rgba(189, 177, 177, 0.2)"
      >
        © 2020 Copyright:
        <a class="text-light" href="https://mdbootstrap.com/">MDBootstrap.com</a>
      </div>
    </footer> -->
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
    <script src="js/controlador.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
  </body>
</html>
