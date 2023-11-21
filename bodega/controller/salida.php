<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../models/Salida.php");
$salida = new Salida();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
    case "GetAll":
        $datos = $salida->get_salida();
        echo json_encode($datos);
        break;
        case "Getid":
            $datos=$salida->get_salida_x_id($body["id_salida"]);
            echo json_encode($datos);
       break;


       case "Insert":
           $datos = $salida->insert_salida($body["codigo_producto"],$body["nombre"],$body["cantidad"],$body["precio"],$body["fecha_salida"]);
           echo json_encode(["mensaje" => $datos]);
                 break;


      case "Update":
        $datos = $salida->update_salida($body["cantidad"],$body["codigo_producto"]);
        echo json_encode("Update Correcto");
  break;


  case "Delete":
    $datos=$producto->delete_prod($body["codigo_producto"]);
    echo json_encode("Delete Correcto");
break;

}

?>