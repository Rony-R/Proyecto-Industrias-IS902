<?php
include_once('../class/class-conexion.php');
$conexion = new Conexion();
$imagen;

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
    $imagen = strval($fila['nombre_img_perfil'].$fila['nombre_img_perfil']);
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
    
    
    if($resQuery){
      $query = sprintf(
        "DELETE 
        FROM tbl_tec_x_usuario
        WHERE id_usuario = '%s'",
        stripslashes($idUsuario)
      );
      $resQuery2 = $conexion->ejecutarConsulta($query);
      if ($resQuery2) {
        foreach ($tecnologias as $tec) {
          $query2 = sprintf(
            "INSERT INTO tbl_tec_x_usuario
            (id_usuario, id_tecnologia) 
            VALUES
            ('%s','%s')",
            stripslashes($idUsuario),
            stripslashes($tec)
          );
          $resQuery3 = $conexion->ejecutarConsulta($query2);
          if ($resQuery3) {
            echo "1";
          } else {
            echo "0"; // error al actualizar usuario
            exit;
          }
        }
      }else {
        echo "0"; // error al actualizar usuario
        exit;
      }
    }else{
      echo "0"; // error al actualizar usuario
      exit;
    }
    // echo count($tecnologias);
    $conexion->cerrarConexion();
    break;
  case "5":
    session_start();
    $idTipoUsuario = "1";
    $idUsuario = "2";
    // $idTipoUsuario = $_SESSION["idTipoUsr"];
    // $idUsuario = $_SESSION["idUsr"];
    if ($idTipoUsuario == 1) {
      $rutaImg = "usuarios/".$idUsuario."/";
      $carpetaDestino="../img/usuarios/".$idUsuario."/";
    } if ($idTipoUsuario == 2) {
      $rutaImg = "empresas/".$idUsuario."/";
      $carpetaDestino="../img/empresas/".$idUsuario."/";
    }
    
    $extension;
    // echo ($_FILES["fileImg"]["type"]);
    if(isset($_FILES["fileImg"]) && $_FILES["fileImg"]["name"][0]){
      if ($_FILES["fileImg"]["type"]=="image/jpeg" ) {
        $extension ="jpeg";
      }if($_FILES["fileImg"]["type"]=="image/jpg" ) {
        $extension ="jpg";
      }if($_FILES["fileImg"]["type"]=="image/gif" ) {
        $extension ="gif";
      }if($_FILES["fileImg"]["type"]=="image/png" ) {
        $extension ="png";
      }
        //../assets/images/fotos/vehiculos/$marca/$modelo/
        
        if($_FILES["fileImg"]["type"]=="image/jpeg" 
        || $_FILES["fileImg"]["type"]=="image/jpg" 
        || $_FILES["fileImg"]["type"]=="image/gif" 
        || $_FILES["fileImg"]["type"]=="image/png"){
          if(file_exists($carpetaDestino)|| @mkdir($carpetaDestino, 755, true)){

            $origen=$_FILES["fileImg"]["tmp_name"];
            $destino= $carpetaDestino.$idUsuario.".".$extension;
            $nombreImg= $idUsuario.".".$extension;
            // Borramos la imagen de perfil anterior
            $files = glob($carpetaDestino.'*'); //obtenemos todos los nombres de los ficheros
            foreach($files as $file){
                if(is_file($file))
                unlink($file); //elimino el fichero
            }
            // Movemos la imagen seleccionada nuestro servidor
            if(@move_uploaded_file($origen, $destino)){ 
              $sql = sprintf(
                "UPDATE tbl_usuario 
                SET 
                  ruta_img_perfil='$rutaImg',
                  nombre_img_perfil='$nombreImg'
                WHERE id_usuario = $idUsuario;"
              );
              $resQuery = $conexion->ejecutarConsulta($sql);
              if ($resQuery) {
                $json['res'][] = array(
                  'nombreImg' => $nombreImg,
                  'ruta' => $rutaImg
                );
                $jsonString = json_encode($json);
              echo $jsonString;
              } else {
                echo "Error en la consulta";
                exit;
              }
              $conexion->cerrarConexion();
            }
            else{
              echo "<br>No se ha podido mover el archivo: ".$_FILES["fileImg"]["name"];
            }
          }
          else{
            echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
          }
        }
        else{
            echo "<br>".$_FILES["fileImg"]["name"]." - NO es imagen jpg, png o gif";
        }              
    }else{
      echo "No se encontro el archivo";
    }
    break;
  default:
    echo ("nulllllllll");
    break;
}

?>