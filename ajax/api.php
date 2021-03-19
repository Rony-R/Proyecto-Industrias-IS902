<?php
    include("../class/class-conexion.php");

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

        case "'accion'":
        break;

        case "'accion'":
        break;

        case "'accion'":
        break;

        case "'accion'":
        break;

    }

?>