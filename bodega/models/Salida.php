<?php
class Salida extends conectar{
    public function get_salida(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM salida";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_salida($cantidad,$codigo_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "UPDATE producto SET cantidad = cantidad - ? where codigo_producto = ?";
        

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cantidad);
        $sql->bindValue(2, $codigo_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_entrada($codigo_producto,$nombre,$cantidad,$precio,$fecha_salida){
        $conectar= parent::conexion();
        parent::set_names(); 
        try{
            $conectar->beginTransaction();
        $sql_salida  = "INSERT INTO entrada (codigo_producto,nombre,cantidad,precio,fecha_salida)
        VALUES (?, ?, ?, ?, ?)";
        $stmt_salida=$conectar->prepare($sql_salida);          
        $stmt_salida->bindValue(1, $codigo_producto);
        $stmt_salida->bindValue(2, $nombre);
        $stmt_salida->bindValue(3, $cantidad);
        $stmt_salida->bindValue(4, $precio);
        $stmt_salida->bindValue(5, $fecha_salida);
        $stmt_salida->execute();
        $lastInsertId= $conectar->lastInsertId();
        $sql_producto = "INSERT INTO producto (codigo_producto, nombre, precio, cantidad)
        VALUES (?, ?, ?, ?)";
        $stmt_producto = $conectar->prepare($sql_producto);
        $stmt_producto->bindValue(1, $lastInsertId);
        $stmt_producto->bindValue(2, $nombre);
        $stmt_producto->bindValue(3, $precio);
        $stmt_producto->bindValue(4, $cantidad);
        $stmt_producto->execute();
        $conectar->commit();
        return "Insert Correcto";
    } catch (Exception $e) {
        $conectar->rollBack();
        return "Error en la transacción: " . $e->getMessage();
    }
    }

}
?>