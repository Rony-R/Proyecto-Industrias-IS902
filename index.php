<?php 

    session_start();
    
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
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
    />
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="css/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/nav.css" />
    <link href="css/stylelanding.css" rel="stylesheet" />
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Landing</title>
  </head>
  <body>
    <nav>
      <!-- NavBar sin login -->
      <ul id="nav-no-login" class="menu mb-0">
        <li class="logo">
          <a href="#">
            <img class="logoImg" src="./img/logos/logo1.png" alt="" />
          </a>
        </li>
        <li class="item"><a href="index.php">Inicio</a></li>        
        <li class="item button log"><a href="registro.php">Registrarse</a></li>
        <li class="item button">
          <a id="h" href="login.php"> Iniciar Sesión </a>
        </li>
        <li class="toggle">
          <span class="bars"></span>
        </li>
      </ul>

      <!-- NavBar freelancer -->
      <ul id="nav-freelancer" class="menu mb-0" style="display:none;">
        <li class="logo">
          <a href="#">
            <img class="logoImg" src="./img/logos/logo1.png" alt="" />
          </a>
        </li>
        <li class="item"><a href="index.php">Inicio</a></li>
        <li class="item"><a href="perfil-info-personal.html">Perfil</a></li>        
        <li class="item button log"><a href="ajax/logout.php">Cerrar Sesión</a></li>
        <li class="item button">
          <a id="h" href="publicaciones.php"> Publicaciones </a>
        </li>
        <li class="toggle">
          <span class="bars"></span>
        </li>
      </ul>

      <!-- NavBar Empresa -->
      <ul id="nav-empresa" class="menu mb-0" style="display:none;">
        <li class="logo">
          <a href="#">
            <img class="logoImg" src="./img/logos/logo1.png" alt="" />
          </a>
        </li>
        <li class="item"><a href="publicaciones.php">Inicio</a></li>
        <li class="item"><a href="perfil-info-personal.html">Perfil</a></li>
        <li class="item"><a href="ajax/logout.php">Cerrar Sesión</a></li>   
        <li class="item button log"><a href="mis-publicaciones.php">Mis Publicaciones</a></li>
        <li class="item button">
          <a id="h" href="pubProyecto.php"> Publicar un Proyecto </a>
        </li>
        <li class="toggle">
          <span class="bars"></span>
        </li>
      </ul>

    </nav>

    <div id="intro" class="mask view">
      <div
        class="containter-fluid d-flex align-items-center justify-content-center h-100"
      >
        <div class="row d-flex jsutify-content-center text-center">
          <div class="col-md-12">
            <h1 class="heading-title white-text">DEVELOPER FINDER</h1>
            <span class="heading-eyebrow white-text"
              >Avanza más rápido en tus proyectos, crea, implementa actualiza el
              software que necesitas.</span
            ><br /><br />
            <a
              type="button"
              href="registro.html"
              class="btn btn-outline-secondary waves-effect"
            >
              Empezar
            </a>
            <button type="button" class="btn btn-outline-info waves-effect">
              Info
            </button>
          </div>
        </div>
      </div>
    </div>

    <main class="mt-5">
      <section id="gallery"></section>
        <h1 class="text-panel-gallery">DESAROLLA TU PROYECTO CON NOSOTROS</h1>
      </section>
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 mb-lg-0 mb-4">
            <img class="img-fluid" src="https://i.imgur.com/iGW7yO5.jpg" />
          </div>
          <div class="col-md-6">
            <div class="text-panel">
              <div>
                <h4 class="panel-heading">
                  Dale vida a cualquier proyecto web, móvil o de escritorio.
                </h4>
                <p class="heading-eyebrow" style="font-size: 18px">
                  No te quedes atras! El mundo de la tecnología avanza día a
                  día, con tus maravillosas e innovadoras ideas juntos podemos
                  crear grandes proyectos que podrán tener impacto sobre
                  millones de personas en todo el mundo, así que, ¿Qué esperas ?
                  tenemos a las personas indicadas para ayudarte a hacer
                  realidad esa idea tuya, ofrecemos flexibilidad para
                  incrementar o reducir recursos según tu necesidad.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr class="my-5" />
      <div class="container my-5">
        <div class="row text-center margin-bottom=300px">
          <h2 class="h2-card">
            No importa que tipo de trabajo necesites, nosotros lo haremos por
            ti.
          </h2>

          <div class="col-sm-4 mb-4">
            <div class="card border-info" style="max-width: 20rem">
              <div class="card-header">
                <img
                  class="img-fluid"
                  width="100"
                  src="https://i.imgur.com/3pmCGKl.png"
                />
              </div>
              <div class="card-body text-info">
                <h5 class="card-title">Programación web</h5>
                <p class="card-text c-text">
                  Hoy en día los negocios se realizan online, es decir, en
                  plataformas web que pueden ser accesibles para millones de
                  personas alrededor de todo el mundo. Comineza la base de tu
                  negocio en la web y crea una página con nosotros para aumentar
                  tus ventas.
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 mb-4">
            <div class="card border-secondary" style="max-width: 20rem">
              <div class="card-header">
                <img
                  class="img-fluid"
                  width="100"
                  src="https://i.imgur.com/fyhVrBl.png"
                />
              </div>
              <div class="card-body text-secondary">
                <h5 class="card-title">Integraciones de sistemas</h5>
                <p class="card-text c-text">
                  La integración de datos es el proceso que implica combinar
                  datos desde distintas fuentes en una única visión unificada.
                  Si tienes varios sistemas implementados en tu negocio trabaja
                  con nosotros para integrarlos en uno solo para aprovechar al
                  máximo esa información.
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 mb-4">
            <div class="card border-info" style="max-width: 20rem">
              <div class="card-header">
                <img
                  class="img-fluid"
                  width="100"
                  src="https://i.imgur.com/A4JNzeo.png"
                />
              </div>
              <div class="card-body text-info">
                <h5 class="card-title">Desarrollo de apps</h5>
                <p class="card-text c-text">
                  En un mundo donde las personas utilizan sus dispositivos
                  móviles las 24 horas del día, es una gran ventaja para crear
                  nuevos modelos de negocios para generar ganancias. Encuentra
                  tu equipo ideal para desarrollar esa idea tuya que impactará
                  la vida de muchas personas, pero sobre todo la tuya.
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="row text-center margin-bottom=300px">
          <h2 class="h2-card">¿Necesitas encargar un trabajo?</h2>

          <div class="col-sm-4 mb-4">
            <div class="card border-info" style="max-width: 20rem">
              <div class="card-header">
                <img
                  class="img-fluid"
                  width="100"
                  src="https://www.f-cdn.com/assets/main/en/assets/home/need-work-done/post-a-job-v3.svg"
                />
              </div>
              <div class="card-body text-info">
                <h5 class="card-title">Publica un Proyecto</h5>
                <p class="card-text c-text">
                  Es fácil. Simplemente publica un trabajo que necesitas
                  terminar y recibe ofertas competitivas de freelancers en
                  cuestión de minutos. Solo crea una cuenta y estas listo para
                  publicar.
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 mb-4">
            <div class="card border-secondary" style="max-width: 20rem">
              <div class="card-header">
                <img
                  class="img-fluid"
                  width="100"
                  src="https://www.f-cdn.com/assets/main/en/assets/illustrations/work.svg"
                />
              </div>
              <div class="card-body text-secondary">
                <h5 class="card-title">Elige el freelance adecuado</h5>
                <p class="card-text c-text">
                  Independientemente de tus necesidades, habrá un freelancer que
                  haga el trabajo: desde diseño web, desarrollo de aplicaciones
                  móviles, asistentes virtuales, manufactura de productos y
                  diseño gráfico (y mucho más).
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-4 mb-4">
            <div class="card border-info" style="max-width: 20rem">
              <div class="card-header">
                <img
                  class="img-fluid"
                  width="100"
                  src="https://www.f-cdn.com/assets/main/en/assets/home/need-work-done/pay-safely-v3.svg"
                />
              </div>
              <div class="card-body text-info">
                <h5 class="card-title">Paga de forma segura</h5>
                <p class="card-text c-text">
                  Con pagos seguros y cientos de profesionales evaluados entre
                  los cuales elegir, Dev Finder es la forma más simple y segura
                  para encargar trabajo en línea.
                </p>
              </div>
            </div>
          </div>
        </div>
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
