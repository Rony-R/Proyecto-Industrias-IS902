<?php
include_once('../class/class-conexion.php');
$conexion = new Conexion();
$imagen;

switch ($_GET["accion"]) {
  case "1": //* mostrar tecnologias
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
  case "2": //* Mostrar paises
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
  case "3": //* Mostrar datos del usuario
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
      'rutaImgPerfil' => $fila['ruta_img_perfil'],
      'nombreImgPerfil' => $fila['nombre_img_perfil']
    );
    $imagen = strval($fila['nombre_img_perfil'].$fila['nombre_img_perfil']);
    $jsonString = json_encode($json);
    echo $jsonString;
    $conexion->cerrarConexion();
    break;
  case "4": //* Editar informacion del usuario
    $idUsuario = $_POST['idUsuario'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $idTipoUsuario = $_POST['idTipoUsuario'];
    $idPais = $_POST['idPais'];
    $nombre = $_POST['nombre'];
    $tecnologias = $_POST['tecnologias']; // Este es un arreglo de tecngologias
    
    $error= "0";
    $mensaje;

    $sql = sprintf(
      "UPDATE tbl_usuario 
      SET 
        id_pais='%s',
        nombre='%s',
        apellido='%s',
        direccion='%s',
        correo='%s',
        telefono='%s'
      WHERE id_usuario = '%s'",
        stripslashes($idPais),
        stripslashes($nombre),
        stripslashes($apellido),
        stripslashes($direccion),
        stripslashes($correo),
        stripslashes($telefono),
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
            $mensaje= "El campo ha sido actualizado";
          } else {
            $mensaje= "No se pudo agregar las categorias";
            $error = "1";
          }
        }
      }else {
        $mensaje= "No se pudo borrar las tecnologias";
        $error = "1";
      }
    }else{
      $mensaje= "No se pudo editar el usuario";
      $error = "1";
    }

    $json['res'][] = array(
      'error' => ''.$error.'',
      'message' => "".$mensaje.""
    );
    $jsonString = json_encode($json);
    echo $jsonString;

    $conexion->cerrarConexion();
    break;
  case "5": //* editar imagen de perfil
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
                  'error' => '0',
                  'message' => 'Se cambio la imagen de perfil',
                  'nombreImg' => $nombreImg,
                  'ruta' => $rutaImg
                );
                $jsonString = json_encode($json);
              echo $jsonString;
              } else {
                $json['res'][] = array(
                  'error' => '1',
                  'message' => 'Error en la consulta'
                );
                $jsonString = json_encode($json);
                echo $jsonString;
                // echo "Error en la consulta";
                exit;
              }
              $conexion->cerrarConexion();
            }
            else{
              $json['res'][] = array(
                'error' => '1',
                'message' => 'No se ha podido mover el archivo'
              );
              $jsonString = json_encode($json);
              echo $jsonString;
              // echo "<br>No se ha podido mover el archivo: ".$_FILES["fileImg"]["name"];
            }
          }
          else{
            $json['res'][] = array(
              'error' => '1',
              'message' => 'No se ha podido crear la carpeta'
            );
            $jsonString = json_encode($json);
            echo $jsonString;
            // echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
          }
        }
        else{
          $json['res'][] = array(
            'error' => '1',
            'message' => 'El archivo no es imagen jpg, png o jpeg'
          );
          $jsonString = json_encode($json);
          echo $jsonString;
        }              
    }else{
      $json['res'][] = array(
        'error' => '1',
        'message' => 'No se encontro el archivo'
      );
      $jsonString = json_encode($json);
      echo $jsonString;
      // echo "No se encontro el archivo";
      exit;
    }
    break;
  case "6": //* Editar contrasenia
    session_start();
    $idUsuario = "2";
    // $idUsuario = $_SESSION["idUsr"];
    if (!empty($_POST)) {
      $passOld = $_POST['passOld'];
      $passNew = $_POST['passNew'];
  
      // comparacion de la vieja contraseña
      $query = sprintf(
        "SELECT * FROM  tbl_usuario
        WHERE id_usuario = $idUsuario;"
      );
      $resQuery = $conexion->ejecutarConsulta($query);
      
      $fila = $conexion->obtenerFila($resQuery);
      
      if ($fila['contrasenia'] == $passOld) {
        $sql = sprintf(
          "UPDATE tbl_usuario 
          SET 
          contrasenia='%s'
          WHERE id_usuario = $idUsuario;",
          stripslashes($passNew)
        );
        $resQuery = $conexion->ejecutarConsulta($sql);
        if ($resQuery) {
          $json['res'][] = array(
            'error' => '0',
            'message' => 'La contraseña ha sido actualizada'
          );
          $jsonString = json_encode($json);
        echo $jsonString;
        } else {
          $json['res'][] = array(
            'error' => '1',
            'message' => 'No se puede cambiar la contraseña'
          );
          $jsonString = json_encode($json);
          echo $jsonString;
          exit;
        }
      } else {
        $json['res'][] = array(
          'error' => '1',
          'message' => 'La contraseña actual es incorrecta'
        );
        $jsonString = json_encode($json);
        echo $jsonString;
        exit;
      }
      $conexion->cerrarConexion();
    }else{
      $json['res'][] = array(
        'error' => '1',
        'message' => 'No se enviaron los parametros'
      );
      $jsonString = json_encode($json);
      echo $jsonString;
    }
    
    break;

  default:
    echo ("nulllllllll");
    break;

}

?>