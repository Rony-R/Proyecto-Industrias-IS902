<?php

  session_start();
  if (!isset($_SESSION["usr"]) || !isset($_SESSION["psw"]))
    header("Location: login.php");

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

    <link rel="stylesheet" href="css/nav.css" />
    <link rel="stylesheet" href="css/pubProyecto2.css" />

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>

    <!--Font Awesome-->
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />

    <title>Publica tu Proyecto</title>
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
        <li class="item"><a href="publicaciones.php">Inicio</a></li>
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

    <div class="row mb-3">
      <div class="col-lg-5 col-md-5 col-sm-12">
        <div class="img">
          <img class="img-fluid" src="./img/logos/progra.svg" alt="" />
        </div>
      </div>
      <div class="col-lg-7 col-md-7 col-sm-12">
        <div class="container">
          <div class="form-container">
            <form
              class=""
              action="./ajax/procesarProyecto.php"
              method="POST"
              enctype="multipart/form-data"
            >
              <h2>Comenzemos a Publicar tu Proyecto</h2>

              <div class="input-div">
                <div class="i">
                  <i class="fas fa-file-code"></i>
                </div>
                <div>
                  <input
                    id="nombProyecto"
                    name="nombProyecto"
                    type="text"
                    class="input"
                    placeholder="Nombre del Proyecto"
                  />
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
              </div>

              <div class="input-div">
                <div class="i">
                  <i class="fas fa-align-justify"></i>
                </div>
                <div>
                  <textarea
                    id="descProyecto"
                    name="descProyecto"
                    cols="30"
                    rows="10"
                    class="input"
                    placeholder="Descripción del Proyecto"
                  ></textarea>
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
              </div>

              <div class="input-div">
                <div class="i">
                  <i class="fas fa-dollar-sign"></i>
                </div>
                <div>
                  <select
                    id="slcPresupuesto"
                    name="slcPresupuesto"
                    class="input"
                    aria-label="Default select example"
                  >
                    <option value="0" selected>Rango de Presupuesto</option>
                  </select>
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
              </div>

              <div class="row mb-0">
                <p class="m-0">
                  Este presupuesto esta sujeto a cambios a medida negocies con
                  los freelances que desarrollaraon tu proyecto tomando en
                  cuenta varios parametros como tecnologías a utilizar, tiempo,
                  etc.
                </p>
              </div>

              <div class="input-div">
                <div class="i">
                  <i class="fas fa-laptop-code"></i>
                </div>
                <div>
                  <select
                    id="slcTipoProyecto"
                    name="slcTipoProyecto"
                    class="input"
                    aria-label="Default select example"
                  >
                    <option value="0" selected>Tipo de Proyecto</option>
                  </select>
                  <div class="invalid-feedback">Este campo es obligatorio.</div>
                </div>
              </div>

              <div class="input-div">
                <div class="i">
                  <i class="fas fa-images"></i>
                </div>
                <div>
                  <input id="file" type="file" name="file" class="input" />
                </div>
              </div>

              <div class="row">
                <p>
                  Sube una imagen que describa tu proyecto, esto es opcional.
                </p>
              </div>

              <button
                id="btnPublicar"
                type="submit"
                name="submit"
                class="btn btnPub"
              >
                Publicar Proyecto
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

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
