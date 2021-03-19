<?php
    include("../class/class-conexion.php");

    $conexion = new Conexion();

    switch($_GET["accion"]){

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
            $sql = "SELECT * FROM TBL_CATEGORIA_PROYECTO;;";
            $resultado = $conexion->ejecutarConsulta($sql);
            $categorias = array();
            while($fila = $conexion->obtenerFila($resultado)){
                $categorias[] = $fila;
            }
            echo (json_encode($categorias));

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