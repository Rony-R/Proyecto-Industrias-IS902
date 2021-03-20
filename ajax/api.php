<?php
    include("../class/class-conexion.php");
    include("../class/class-comentario.php");
    include("../class/class-publicacion.php");

    $conexion = new Conexion();

    switch($_GET["accion"]){

        case "'traerPresupuestos'":
            $sql = "SELECT * FROM TBL_PRESUPUESTO;";
            $resultado = $conexion->ejecutarConsulta($sql);
            $rJson = json_encode($resultado);
            echo $rJson;
        break;

        case "'traerTipoProyectos'":
            $sql = "SELECT * FROM TBL_CATEGORIA_PROYECTO;";
            $resultado = $conexion->ejecutarConsulta($sql);
            $rJson = json_encode($resultado);
            echo $rJson;
        break;

        case "ver-comentario-publicacion":
            $verComPub = new Comentario(null,null,null,null,null);
            echo $verComPub->verComentarioPublicación($conexion);
        break;

        case "ver-informacion-publicacion":
            $verInfoPub = new Publicacion(null,null,null,null,null,null,null);
            echo $verInfoPub->verPublicacionEspecifica($conexion);
        break;

        case "ver-informacion-usuario-publicacion":
            $verInfoUserPub = new Publicacion(null,null,null,null,null,null,null);
            echo $verInfoUserPub->verInformacionUsuarioPublicacion($conexion);
        break;

        /*case "'accion'":
        break;*/

    }

?>