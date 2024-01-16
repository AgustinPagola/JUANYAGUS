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
}