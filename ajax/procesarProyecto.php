<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap 4 -->
     <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
      crossorigin="anonymous"
    />

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="../css/nav.css" />
    <link rel="stylesheet" href="../css/pubProyecto.css" />

    <title>Publicando el Proyecto...</title>
</head>
<body>
    
    <nav>
      <ul class="menu">
        <li class="logo">
          <a href="#">
            <img class="logoImg" src="../img/logos/logo2.png" alt="" />
          </a>
        </li>
        <li class="item"><a href="#">Home</a></li>
        <li class="item"><a href="#">Registrarse</a></li>
        <li class="item button log"><a href="#">Iniciar Sesión</a></li>
        <li class="item button">
          <a id="h" href="pubProyecto.html"> Publicar un Proyecto </a>
        </li>
        <li class="toggle">
          <span class="bars"></span>
        </li>
      </ul>
    </nav>

    <?php

        $v1 = ( empty($_POST['nombProyecto']) ) ? NULL : $_POST['nombProyecto'];
        $v2 = ( empty($_POST['descProyecto']) ) ? NULL : $_POST['descProyecto'];
        $v3 = ( empty($_POST['correo']) ) ? NULL : $_POST['correo'];
        $v4 = ( empty($_POST['telefono']) ) ? NULL : $_POST['telefono'];
        $v5 = ( empty($_POST['slcPresupuesto']) ) ? NULL : $_POST['slcPresupuesto'];

        if($v1 && $v2 && $v3 && $v4 && $v5){

            if(isset($_POST['submit'])){

                $filecount = count($_FILES['file']['name']);
                $rutas = array();
                $imgNames = array(); 
    
                for($i=0; $i < $filecount; $i++){
    
                    $name = $_FILES['file']['name'][$i];
                    $tmp_name = $_FILES['file']['tmp_name'][$i];
                    $error = $_FILES['file']['error'][$i];
                    $size = $_FILES['file']['size'][$i];
                    $max_size = 1024*1024*1;
                    $type = $_FILES['file']['type'][$i];
    
                    if($error){
                        $resultado = "Ha ocurrido un error";
                    }
                    else if ($size > $max_size){
                        $resultado = "El tamaño supera el máximo permitido: 1MB.";
                    }
                    else if ($type != 'image/jpg' && $type != 'image/png' && $type != 'image/gif' && $type != 'image/jpeg') {
                        $resultado = "Los unicos archivos permitidos son: .jpg|.png|.gif|.jpeg";
                    }
    
                    else{
                        $ruta = '../img/imgProyectos/' . $name;
                        $rutas[$i] = $ruta;
                        $imgNames[$i] = $name;
                        move_uploaded_file($tmp_name, $ruta);
                        $resultado = "La imagen '$name' se ha guardado!";
                    }
                }
    
                //Imprimiendo una card con la info
                echo '<div class="row justify-content-center">';
                    echo '<div class="card col-lg-8 mt-5" style="width: 30rem; border:solid 2px;">';
                        echo '<div class="card-body">';
                            echo '<strong><h5 class="card-title text-center">Revisión de Datos</strong></h5>';
                            echo '<p class="card-text mt-3">Estos son los datos que has agregado:</p>';
                            echo '<ul class="list-group list-group-flush">';
                                echo '<li class="list-group-item"><label class="font-weight-bold lb-rev">Nombre del Proyecto:</label>'.$_POST["nombProyecto"].'</li>';
                                echo '<li class="list-group-item"><label class="font-weight-bold lb-rev">Descripción:</label>'.$_POST["descProyecto"].'</li>';
                                echo '<li class="list-group-item"><label class="font-weight-bold lb-rev">Correo Electrónico:</label>'.$_POST["correo"].'</li>';
                                echo '<li class="list-group-item"><label class="font-weight-bold lb-rev">Telefono:</label>'.$_POST["telefono"].'</li>';
                                switch($_POST["slcPresupuesto"]){
                                    case 1:
                                        echo '<li class="list-group-item"><label class="font-weight-bold">Presupuesto: </label> $1,500 - $3,000</li>';
                                    break;

                                    case 2:
                                        echo '<li class="list-group-item"><label class="font-weight-bold">Presupuesto: </label> $3,000 - $5,000</li>';
                                    break;

                                    case 3:
                                        echo '<li class="list-group-item"><label class="font-weight-bold">Presupuesto: </label> $5,000 - $10,000</li>';
                                    break;

                                    case 4:
                                        echo '<li class="list-group-item"><label class="font-weight-bold">Presupuesto: </label> $10,000 - $20,000</li>';
                                    break;

                                    case 5:
                                        echo '<li class="list-group-item"><label class="font-weight-bold">Presupuesto: </label> Más de $20,000</li>';
                                    break;
                                }
                                echo '<li class="list-group-item"><label class="font-weight-bold">Rutas de las imagenes:</label></li>';
                                for($i=0; $i < count($rutas); $i++){
                                    echo '<li class="list-group-item">'.$rutas[$i].'</li>';
                                }
                                echo '<li class="list-group-item"><label class="font-weight-bold">Nombres de las imagenes:</label></li>';
                                for($i=0; $i < count($imgNames); $i++){
                                    echo '<li class="list-group-item">'.$imgNames[$i].'</li>';
                                }
                            echo '</ul>';
                            echo '<a href="../pubProyecto.html" class="btn btn-secondary btn-rev1">Cancelar</a>';
                            echo '<button id="guardar-publicacion" type="button" class="btn btn-primary btn-rev2">Guardar</button>';
                        echo '</div>';
                    echo '</div>';
                echo '</div>';
    
            }                   
        }
        else{
            echo'<div class="row justify-content-center">';
                echo '<div class="card mb-3" style="width: 20rem; border:solid 2px;">';
                    echo '<img src="../img/logos/warning.jfif" class="card-img-top mt-3" alt="...">';
                    echo '<div class="card-body">';
                        echo '<h5 class="card-title text-center">Advertencia!</h5>';
                        echo '<p class="card-text text-justify">Todos los campos son obligatorios a excepción de las imagenes, asegurate de llenar todo.</p>';
                        echo '<a href="../pubProyecto.html" class="btn btn-primary mt-3">Regresar</a>';
                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }

    ?>
        <script src="../js/nav.js" type="text/javascript"></script>
    </body>
</html> 