<?php
require_once './config.php';
    class productsModel{
        private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host ='.MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }

        function getProducts(){
            $query =$this->db->prepare('SELECT * FROM productos');
            $query->execute();

            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        function addProduct($nombre, $precio){
            $query = $this->db->prepare('INSERT INTO productos (nombre,precio) VALUES (?,?)');
            $query->execute([$nombre,$precio]);
            return $this->db->lastInsertId();
        }
        function removeProduct($idProduct){
            $query = $this->db->prepare('DELETE FROM productos WHERE id=?');
            $query->execute([$idProduct]);
            
        }
        function getProduct($idProducto){
            $query = $this->db->prepare('SELECT * FROM productos where id=?');
            $query->execute([$idProducto]);
            return $query->fetch(PDO::FETCH_OBJ);
        }

        function updateProduct($id, $newName, $newPrice){
        $query = $this->db->prepare("UPDATE productos SET nombre=?, precio=? WHERE id = ?");
        $query->execute([$newName, $newPrice, $id]);
        }
        function getPrice($id){
            $query = $this->db->prepare('SELECT precio FROM productos WHERE id=?');
            $query->execute([$id]);
            return $query->fetchColumn();
        }
    }