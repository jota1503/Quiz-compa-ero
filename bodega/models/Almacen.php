<?php
class Almacen extends conectar{
    public function get_almacen(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM almacen";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_almacen_x_id($id_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT * FROM almacen where id_producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_almacen($nombre, $cantidad, $fecha_entrega, $id_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "UPDATE almacen SET 
        nombre = ?,
        cantidad = ?,
        fecha_entrega = ?,
        WHERE id_producto = ?";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $cantidad);
        $sql->bindValue(4, $fecha_entrega);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_almacen($id_producto, $nombre, $cantidad, $fecha_entrega){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO almacen (id_producto, nombre, cantidad, fecha_entrega) 
    VALUES (?, ?, ?, ?)";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->bindValue(2, $nombre);
        $sql->bindValue(3, $cantidad);
        $sql->bindValue(4, $fecha_entrega);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function delete_almacen($id_producto){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "DELETE from almacen where
        id_producto = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id_producto);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
    }

?>