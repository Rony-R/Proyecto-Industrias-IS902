<?php
include_once('../class/class-conexion.php');
$conexion = new Conexion();

switch ($_GET["accion"]) {
  case "1":
    $query = 'select * from tbl_tecnologias';
    $resQuery = $conexion->ejecutarConsulta($query);

    $json = array();

    while ($fila = $conexion->obtenerFila($resQuery)) {
      $json[] = array(
        'id' => $fila['id_tecnologia'],
        'tecnologia' => $fila['tecnologia']
      );
    }
    
    $jsonString = json_encode($json);
    echo $jsonString;
    break;
  case "2":
    $query = 'select * from tbl_paises';
    $resQuery = $conexion->ejecutarConsulta($query);

    $json = array();

    while ($fila = $conexion->obtenerFila($resQuery)) {
      $json[] = array(
        'id' => $fila['id_pais'],
        'pais' => $fila['pais']
      );
    }
    
    $jsonString = json_encode($json);
    echo $jsonString;
    break;
  case "3":
    $idUsuario = $_GET['idUsuario'];

    // Obteniendo datos del usuario
    $query = "select * from tbl_usuario u
              inner join tbl_paises p on p.id_pais = u.id_pais
              inner join tbl_tipo_usuario tp on tp.id_tipo_usuario = u.id_tipo_usuario
              where u.id_usuario = $idUsuario";
    $resQuery = $conexion->ejecutarConsulta($query);

    // Obteniendo tecnologias del usuario
    $query2 = "select t.tecnologia tec from tbl_usuario u
              inner join tbl_tec_x_usuario tu on tu.id_usuario = u.id_usuario
              inner join tbl_tecnologias t on t.id_tecnologia = tu.id_tecnologia 
              where u.id_usuario = $idUsuario";    
    $resQuery2 = $conexion->ejecutarConsulta($query2);

    // Obteniendo los proyectos en los que ha trabajado el usuario con devFinder
    

    $json[] = array();

    while ($fila = $conexion->obtenerFila($resQuery2)) {
      $json[0]['tecnologias'][] = array(
        $fila['tec']
      );
    }

    $fila = $conexion->obtenerFila($resQuery);
    $json[0]['info'][] = array(
      'idUsuario' => $fila['id_usuario'],
      'tipoUsuario' => $fila['tipo_usuario'],
      'pais' => $fila['pais'],
      'nombre' => $fila['nombre'],
      'apellido' => $fila['apellido'],
      'direccion' => $fila['direccion'],
      'correo' => $fila['correo'],
      'telefono' => $fila['telefono'],
      'contrasenia' => $fila['contrasenia'],
      'rutaImgPerfil' => $fila['ruta_img_perfil'],
      'nombreImgPerfil' => $fila['nombre_img_perfil']
    );

    $jsonString = json_encode($json);
    echo $jsonString;
    break;
  
  default:
    echo ("nulllllllll");
    break;
}

?>