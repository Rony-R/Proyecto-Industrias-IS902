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
        'idTecnologia' => $fila['id_tecnologia'],
        'tecnologia' => $fila['tecnologia']
      );
    }
    
    $jsonString = json_encode($json);
    echo $jsonString;
    $conexion->cerrarConexion();
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
    $conexion->cerrarConexion();
    break;
  case "3":
    $idUsuario = $_GET['idUsuario'];

    // Obteniendo datos del usuario
    $query = "SELECT * FROM tbl_usuario u
              inner join tbl_paises p on p.id_pais = u.id_pais
              inner join tbl_tipo_usuario tp on tp.id_tipo_usuario = u.id_tipo_usuario
              WHERE u.id_usuario = $idUsuario";
    $resQuery = $conexion->ejecutarConsulta($query);

    // Obteniendo tecnologias del usuario
    $query2 = "SELECT t.tecnologia tec, t.id_tecnologia idTecnologia FROM tbl_usuario u
              inner join tbl_tec_x_usuario tu on tu.id_usuario = u.id_usuario
              inner join tbl_tecnologias t on t.id_tecnologia = tu.id_tecnologia 
              WHERE u.id_usuario = $idUsuario";    
    $resQuery2 = $conexion->ejecutarConsulta($query2);

    // Obteniendo los proyectos en los que ha trabajado el usuario con devFinder
    $query3 = "SELECT COUNT(id_usuario) experiencia FROM tbl_experiencia
                WHERE id_usuario  = $idUsuario";    
    $resQuery3 = $conexion->ejecutarConsulta($query3);
    
    $json[] = array();
    
    $fila = $conexion->obtenerFila($resQuery3);
    $json[0]['expeciencia'][] = array($fila['experiencia']);

    while ($fila = $conexion->obtenerFila($resQuery2)) {
      $json[0]['tecnologias'][] = array(
        'tecnologia' => $fila['tec'],
        'idTecnologia' => $fila['idTecnologia']

      );
    }

    $fila = $conexion->obtenerFila($resQuery);
    $json[0]['info'][] = array(
      'idUsuario' => $fila['id_usuario'],
      'tipoUsuario' => $fila['tipo_usuario'],
      'idTipoUsuario' => $fila['id_tipo_usuario'],
      'pais' => $fila['pais'],
      'idPais' => $fila['id_pais'],
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
    $conexion->cerrarConexion();
    break;
  case "4": // Editar informacion del usuario
    $idUsuario = $_POST['idUsuario'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contrasenia = $_POST['contrasenia'];
    $rutaImgPerfil = $_POST['rutaImgPerfil'];
    $nombreImgPerfil = $_POST['nombreImgPerfil'];
    $idTipoUsuario = $_POST['idTipoUsuario'];
    $idPais = $_POST['idPais'];
    $nombre = $_POST['nombre'];
    $tecnologias = $_POST['tecnologias']; // Este es un arreglo de tecngologias
    
    $sql = sprintf(
      "UPDATE tbl_usuario 
      SET 
        id_pais='%s',
        nombre='%s',
        apellido='%s',
        direccion='%s',
        correo='%s',
        telefono='%s',
        contrasenia='%s',
        ruta_img_perfil='%s',
        nombre_img_perfil='%s'
      WHERE id_usuario = '%s'",
        stripslashes($idPais),
        stripslashes($nombre),
        stripslashes($apellido),
        stripslashes($direccion),
        stripslashes($correo),
        stripslashes($telefono),
        stripslashes($contrasenia),
        stripslashes($rutaImgPerfil),
        stripslashes($nombreImgPerfil),
        stripslashes($idUsuario)
    );
    $resQuery = $conexion->ejecutarConsulta($sql);
    
    $conexion->cerrarConexion();
    if($resQuery){
      echo "Registro actualizado con exito";
    }else{
      echo "Error al actualizar el registro";
      exit;
    }
    // echo count($tecnologias);

    break;
  default:
    echo ("nulllllllll");
    break;
}

?>