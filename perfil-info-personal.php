<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/38614da2b6.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="./css/perfil-maquetado.css" />
    <link rel="stylesheet" href="css/perfil-info-personal.css" />
    <title>Perfil</title>
  </head>
  <body class="grid-container">
    <nav class="navbar">
      <ul class="grid-navbar">
        <li class="nav-item1">
          <a href="#"
            ><img class="logo" src="./img/logos/logo1.png" alt="logo"
          /></a>
        </li>
        <li class="nav-item2"><div class="nombre-empresa">Empresa x</div></li>
        <li class="nav-item4">
          <a href="#"
            ><img
              class="img-perfil"
              src="./img/Empressas/Empresa x/logo.jpg"
              alt=""
          /></a>
        </li>
      </ul>
    </nav>
    <aside class="sidebar">
      <div class="menu-lateral">
        <ul>
          <li>
            <a href="publicaciones.html"
              ><i class="fas fa-house-user"></i>
              <div class="cont-nav">Pagina principal</div>
            </a>
          </li>
          <li>
            <a href="perfil-info-personal.html"
              ><i class="fas fa-clipboard-list"></i>
              <div class="cont-nav">Información personal</div></a
            >
          </li>
          <li>
            <a href="perfil-publicaciones.html"
              ><i class="fas fa-user-cog"></i>
              <div class="cont-nav">Publicaciones Propias</div></a
            >
          </li>
          <li>
            <a href="perfil-pagos.html"
              ><i class="fas fa-credit-card"></i>
              <div class="cont-nav">Pagos</div></a
            >
          </li>
          <div class="line"></div>
          <li>
            <a href="#"
              ><i class="fas fa-info-circle"></i>
              <div class="cont-nav">Informacion</div></a
            >
          </li>
        </ul>
      </div>
    </aside>
    <!-- Informacion Personal de la empresa -->
    <article class="main">
      <div class="grid-main">
        <div class="items">
          <h1>Información personal</h1>
          <p>
            Información básica, como tu nombre y foto, que usas en los servicios
            de Developer Finder
          </p>
          <img
            class="img-publicaciones"
            src="./img/perfil/Personal_site_re_c4bp.svg"
            alt=""
          />
        </div>
        <div class="info-basica">
          <fieldset class="card-info">
            <legend><h3>Información básica</h3></legend>
            <div class="form-info img">
              <img
                class="foto-perfil"
                src="./img/Empressas/Empresa x/logo.jpg"
                alt="foto de perfil"
              />
            </div>
            <div class="form-info">
              <a href="#">
                <label class="titulo-label">Nombre:</label>
                <h4>Empresa X</h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
            <div class="form-info">
              <a href="#">
                <label>Fecha de inicio:</label>
                <h4>10 de agosto de 2001</h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
            <div class="form-info">
              <a href="#">
                <label>Sector:</label>
                <h4>Salud, ...</h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
            <div class="form-info">
              <a href="#">
                <label>Categoría:</label>
                <h4>Fármacos, ...</h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
            <div class="form-info">
              <a href="#">
                <label>Contraseña:</label>
                <h4>••••••••</h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </fieldset>
        </div>
        <div class="info-basica">
          <fieldset class="card-info">
            <legend><h3>Información de contacto</h3></legend>
            <div class="form-info">
              <a href="#">
                <label class="titulo-label">Correo Electrónico:</label>
                <h4>empresax.info@empresax.com</h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
            <div class="form-info">
              <a href="#">
                <label>Teléfono:</label>
                <h4>+(504) 9999-9999</h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
            <div class="form-info">
              <a href="#">
                <label>Dirección:</label>
                <h4>
                  Honduras, Francisco Morazan, Tegucigalpa, 11101, UNAH CU
                </h4>
                <i class="fas fa-chevron-right"></i>
              </a>
            </div>
          </fieldset>
        </div>
      </div>
      <!-- Fin Informacion Personal de la empresa -->
    </article>
    <footer class="footer">
      <div class="grid-footer">
        <img class="logo-footer" src="./img/logos/logo1.png" alt="" />
        <h3 class="developers">Desarrolladores</h3>
        <div class="developer developer1">
          <img src="./img/logos/prof.jpeg" alt="" />
          <h4>Andres Lizardo</h4>
        </div>
        <div class="developer developer2">
          <img src="./img/logos/prof.jpeg" alt="" />
          <h4>Rafael Bautista</h4>
        </div>
        <div class="developer developer3">
          <img src="./img/logos/prof.jpeg" alt="" />
          <h4>Jheral Blanco</h4>
        </div>
        <div class="developer developer4">
          <img src="./img/logos/prof.jpeg" alt="" />
          <h4>Rony Rodriguez</h4>
        </div>
        <div class="developer developer5">
          <img src="./img/logos/prof.jpeg" alt="" />
          <h4>Josue Lanza</h4>
        </div>
        <div class="copy">
          <h4>
            © 2020 Copyright:
            <a class="text-light" href="https://www.unah.edu.hn/">
              UNAH - www.unah.edu.hn</a
            >
          </h4>
        </div>
      </div>
    </footer>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="./js/controlador-perfil.js"></script>
  </body>
</html>
