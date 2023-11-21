<?php
class Entrada extends conectar{
    public function get_entrada(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM entrada";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_entrada($cantidad,$codigo_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "UPDATE producto SET cantidad = cantidad + ? where codigo_producto = ?";
        

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $cantidad);
        $sql->bindValue(2, $codigo_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_entrada($codigo_producto,$nombre,$cantidad,$precio,$fecha_entrada){
        $conectar= parent::conexion();
        parent::set_names(); 
        try{
            $conectar->beginTransaction();
        $sql_entrada  = "INSERT INTO entrada (codigo_producto,nombre,cantidad,precio,fecha_entrada)
        VALUES (?, ?, ?, ?, ?)";
        $stmt_entrada=$conectar->prepare($sql_entrada);
        $stmt_entrada->bindValue(1, $codigo_producto);
        $stmt_entrada->bindValue(2, $nombre);
        $stmt_entrada->bindValue(3, $cantidad);
        $stmt_entrada->bindValue(4, $precio);
        $stmt_entrada->bindValue(5, $fecha_entrada);
        $stmt_entrada->execute();
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