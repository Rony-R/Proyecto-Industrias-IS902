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
  
  default:
    echo ("nulllllllll");
    break;
}

?>