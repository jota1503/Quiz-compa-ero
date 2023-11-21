<?php
header('Content-Type: application/json');
require_once("../config/conexion.php");
require_once("../models/Producto.php");
$producto = new Producto();

$body = json_decode(file_get_contents("php://input"), true);

switch($_GET["op"]){
    case "GetAll":
        $datos = $producto->get_producto();
        echo json_encode($datos);
        break;
        case "Getid":
            $datos=$producto->get_producto_x_id($body["codigo_producto"]);
            echo json_encode($datos);
       break;


       case "Insert":
           $datos = $producto->insert_producto($body["codigo_producto"],$body["nombre"],$body["precio"],$body["cantidad"]);
           echo json_encode("Insert Correcto");
      break;


      case "Update":
        $datos = $producto->update_producto($body["nombre"],$body["precio"],$body["cantidad"],$body["codigo_producto"]);
        echo json_encode("Update Correcto");
  break;


  case "Delete":
    $datos=$producto->delete_prod($body["codigo_producto"]);
    echo json_encode("Delete Correcto");
break;

}

?>