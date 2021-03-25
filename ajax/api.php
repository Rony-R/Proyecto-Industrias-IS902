<?php
    include("../class/class-conexion.php");
    include("../class/class-comentario.php");
    include("../class/class-publicacion.php");
    include("../class/class-solicitud.php");

    $conexion = new Conexion();

    switch($_GET["accion"]){

        case "'verificarLogIn'":
            session_start();

            if(isset($_SESSION["usr"]) && isset($_SESSION["psw"]))
                echo 1;
            else
                echo 0;
        break;

        case "'tipoUsuario'":
            session_start();
            if($_SESSION["idTipoUsr"] == 1)
                echo 1;
            else
                echo 2;
        break;

        case "'traerPresupuestos'":
            $sql = "SELECT * FROM TBL_PRESUPUESTO;";
            $resultado = $conexion->ejecutarConsulta($sql);
            $presupuestos = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $presupuestos[] = $fila;
            }
            echo (json_encode($presupuestos));

        break;
        
        case "'traerTipoProyectos'":
            $sql = "SELECT * FROM TBL_CATEGORIA_PROYECTO;";
            $resultado = $conexion->ejecutarConsulta($sql);
            $categorias = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $categorias[] = $fila;
            }
            echo (json_encode($categorias));

        break;

        case "'traerPublicaciones'":
            $sql = "SELECT * FROM TBL_PUBLICACION;";
            $resultado = $conexion->ejecutarConsulta($sql);
            $publicaciones = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $publicaciones[] = $fila;
            }
            echo (json_encode($publicaciones));
            //echo (json_encode($publicaciones[2]));
        break;

        case "ver-comentario-publicacion":
            $verComPub = new Comentario(null,null,$_GET["publicacion"],null,null);
            echo $verComPub->verComentarioPublicación($conexion);
        break;

        case "insertar-comentario":
            $insCom = new Comentario(null,$_POST["idUsuario"],$_POST["idPublicacion"],$_POST["Comentario"],null);
            echo $insCom->insertarNuevoComentario($conexion);
        break;

        case "ver-informacion-publicacion":
            $verInfoPub = new Publicacion($_GET["publicacion"],null,null,null,null,null,null);
            echo $verInfoPub->verPublicacionEspecifica($conexion);
        break;

        case "ver-lista-publicaciones":
            $verPubs = new Publicacion(null,null,null,null,null,null,null);
            echo $verPubs->verPublicaciones($conexion);
        break;

        case "ver-informacion-usuario-publicacion":
            $verInfoUserPub = new Publicacion($_GET["publicacion"],null,null,null,null,null,null);
            echo $verInfoUserPub->verInformacionUsuarioPublicacion($conexion);
        break;

        case "enviar-solicitud":
            $enviarSol = new Solicitud(null,$_POST["idPublicacion"],$_POST["idUsuario"],null);
            echo $enviarSol->enviarSolicitud($conexion);
        break;

    }

?>