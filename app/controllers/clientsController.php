<?php

require_once './app/models/clientsModel.php';
require_once './app/views/clientsView.php';
class clientsController{
    private $view;
    private $model;
    function __construct(){
        $this->view = new clientsView();
        $this->model = new clientsModel();
    }
    function showClients(){
        $list = $this->model->getClients();
        if(AuthHelper::checkLogin()){
            $this->view->showClients($list);
        }
        else{
            $this->view->showClientsOffline($list);
        }
    }
    function addClient(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        if(empty($nombre)||empty($apellido)||empty($email)){
        $this->view->showError("Complete todos los campos");
        return;
        }
        $idClient = $this->model->addClient($nombre, $apellido, $email);
        if($idClient){
            header('location: '.BASE_URL.'clients');
        }
        else{
            $this->view->showError("No se pudo agregar cliente");
        }
    }
    function removeClient($id){
        $this->model->deleteClient($id);
        header('location: '.BASE_URL.'clients');
    }
    function getClient($id){
        $client = $this->model->getClient($id);
        $this->view->getClient($id, $client);
    }
    function updateClient($id){
  
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        
        if(empty($nombre)||empty($apellido)||empty($email)){
        $this->view->showError("Complete todos los campos");
        return;
        }
       $this->model->updateClient($id, $nombre, $apellido, $email );
       
            header('location: '.BASE_URL.'clients');
        
        
    }
}