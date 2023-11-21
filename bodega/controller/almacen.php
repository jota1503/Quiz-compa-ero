<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../models/Almacen.php");
$almacen  = new Almacen();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
    case "GetAll":
        $datos = $almacen->get_almacen();
        echo json_encode($datos);
        break;
        case "Getid":
            $datos=$almacen->get_almacen_x_id($body["id_producto"]);
            echo json_encode($datos);
       break;


       case "Insert":
           $datos=$almacen->insert_almacen($body["id_producto"],$body["nombre"],$body["cantidad"],$body["fecha_entrega"]);
           echo json_encode("Insert Correcto");
      break;


      case "Update":
       $datos=$almacen->insert_almacen($body["nombre"],$body["cantidad"],$body["fecha_entrega"],$body["id_producto"]);
       echo json_encode("Update Correcto");
  break;


      case "Delete":
       $datos=$almacen->delete_almacen($body["id_producto"]);
       echo json_encode("Delete Correcto");
break;

{
    case "GetAll":
        $datos = $almacen->get_almacen();
        echo json_encode($datos);
        break;
    case "Getid":
        $datos = $almacen->get_almacen_x_id($body["id_producto"]);
        echo json_encode($datos);
        break;

    case "Insert":
        $datos = $almacen->insert_almacen($body["id_producto"], $body["nombre"], $body["cantidad"], $body["fecha_entrega"]);

        // Registro de entrada de productos
        $almacen->registrarEntradaSalida($body["id_producto"], $body["cantidad"], 'entrada');

        echo json_encode("Insert Correcto");
        break;

    case "Update":
        $datos = $almacen->update_almacen($body["nombre"], $body["cantidad"], $body["fecha_entrega"], $body["id_producto"]);
        echo json_encode("Update Correcto");
        break;

    case "Delete":
        // Registro de salida de productos antes de eliminar
        $almacen->registrarEntradaSalida($body["id_producto"], $body["cantidad"], 'salida');
        $datos = $almacen->delete_almacen($body["id_producto"]);
        echo json_encode("Delete Correcto");
        break;
}
}

?>