<?php
    session_start();
    include("../class/class-conexion.php");
    $conexion = new Conexion();
    $sql = sprintf( 
        "SELECT id_usuario, correo, contrasenia FROM tbl_usuario WHERE correo = '%s' and contrasenia ='%s'",
        $_POST["Correo"],
        $_POST["Password"]);
 
    $resultado = $conexion->ejecutarConsulta($sql);
    $respuesta = array();
    if ($conexion->cantidadRegistros($resultado)>0){
        $respuesta = $conexion->obtenerFila($resultado);
        $respuesta["codigoResultado"] = 0;
        $respuesta["mensajeResultado"] = "El usuario si existe";
        $_SESSION["usr"] = $respuesta["correo"];
        $_SESSION["psw"] = $respuesta["contrasenia"];
        $_SESSION["idUsr"] = $respuesta["id_usuario"];
    }else {
        $respuesta["codigoResultado"] = 1;
        $respuesta["mensajeResultado"] = "El usuario no existe";
        session_destroy();
    }
    echo json_encode($respuesta);
?>