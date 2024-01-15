<?php
require_once './config.php';
    class clientsModel{
        private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host ='.MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);
        }
        function getClients(){
            $query = $this->db->prepare('SELECT * FROM clientes');
            $query->execute();
            
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
    }