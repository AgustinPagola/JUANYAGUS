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
    }