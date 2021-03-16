<?php
// include_once('../class/class-conexion.php');
// $conexion = new Conexion();

switch ($_GET["accion"]) {
  case "1":
    $json = array();
    $json[] = array(
      'nombre' => 'Jheral Blanco'
    );
    $jsonHola = json_encode($json);
    echo $jsonHola;
    break;
  
  default:
    echo ("No da ni madres");
    break;
}

?>