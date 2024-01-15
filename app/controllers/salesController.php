<?php
require_once './app/models/salesModel.php';
require_once './app/models/clientsModel.php';
require_once './app/models/productsModel.php';
require_once './app/views/salesView.php';

class salesController{
    private $model;
    private $clientModel;
    private $productModel;
    private $view;

    function __construct(){
        $this->model = new salesModel();
        $this->clientModel = new clientsModel();    
        $this->productModel = new productsModel();
        $this->view = new salesView();

    }
    
    function showSales(){
        $list = $this->model->getSales();
        $clients = $this->clientModel->getClients();
        $products = $this->productModel->getProducts();
        $this->view->showSales($list, $clients, $products);
    }

}