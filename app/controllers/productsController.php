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
        function addProduct(){
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];

            $idProducto =  $this->model->addProduct($nombre,$precio);
            if($idProducto){
                header('Location: ' . BASE_URL .'products');
            }
            else{
                $this->view->showError("error al insertar producto");
            }
    
        }
    }