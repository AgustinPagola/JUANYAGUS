<?php
require_once './config.php';

class salesModel{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host ='.MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);
    }


    function getSales(){
        $query = $this->db->prepare('SELECT a.*, b.nombre AS clienteNombre, c.nombre AS productoNombre FROM ventas a LEFT JOIN clientes b ON a.idCliente = b.id LEFT JOIN productos c ON a.idProducto = c.id');

        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    function addSale($cliente,$producto,$cantidad,$montoTotal){
        $query = $this->db->prepare('INSERT INTO ventas (idCliente,idProducto,cantidad,montoTotal)VALUES (?,?,?,?)');
        $query->execute([$cliente,$producto,$cantidad,$montoTotal]);
        return $this->db->lastInsertId();
    }

    function deleteSale($id){
        $query = $this->db->prepare('DELETE FROM ventas WHERE id=?');
        $query->execute([$id]);
    }
}