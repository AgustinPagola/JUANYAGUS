<?php
require_once './app/models/productsModel.php';
require_once './app/views/productsView.php';
    class productsController{
        private $view;
        private $model;
        function __construct(){
            $this->view = new productsView();
            $this->model = new productsModel();
        }

        function showProducts(){
            $list = $this->model->getProducts();
            $this->view->showProductsList($list);
        }
    }