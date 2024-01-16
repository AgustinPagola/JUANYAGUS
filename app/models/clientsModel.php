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
        function addClient($nombre, $apellido, $email){
            $query = $this->db->prepare('INSERT INTO clientes(nombre, apellido , email) VALUES(?, ?, ?)');
            $query->execute ([$nombre, $apellido, $email]);
            return $this->db->lastInsertId();
        }
        function deleteClient($id){
            $query = $this->db->prepare('DELETE FROM clientes WHERE id = ?');
            $query->execute ([$id]);
        }
        function getClient($id){
            $query = $this->db->prepare('SELECT * FROM clientes WHERE id = ?');
            $query->execute ([$id]);
            return $query->fetchAll(PDO::FETCH_OBJ);
        }
        function updateClient($id, $nombre, $apellido, $email){
        
            $query = $this->db->prepare("UPDATE clientes SET nombre=?, apellido=?,
            email=? WHERE id = ?");
            $query->execute ([$nombre, $apellido, $email, $id]);
            
        }

    }