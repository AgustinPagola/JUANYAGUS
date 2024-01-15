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
        $this->view->showClients($list);
    }
}