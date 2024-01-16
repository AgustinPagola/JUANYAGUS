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
            if(empty($nombre) || empty($precio)){
                $this->view->showError("Debe completar los campos");
                return;
            }
            $idProducto =  $this->model->addProduct($nombre,$precio);
            if($idProducto){
                header('Location: '. BASE_URL .'products');
            }
            else{
                $this->view->showError("error al insertar producto");
            }
    
        }
        function removeProduct($idProduct){
            $this->model->removeProduct($idProduct);
            header('location: '.BASE_URL.'products');

        }
        function getProduct($idProducto){
            $this->model->getProduct($idProducto);
        }
        function editProduct($idProduct){
            $product = $this->model->getProduct($idProduct);
            $this->view->editProduct($idProduct,$product);
        }
        function updateProduct($id){

            $newName= $_POST['nombre'];
            $newPrice = $_POST['precio'];

            if(empty($newName)||empty($newPrice)){
                $this->view->showError("complete todos los campos");
                return;
            }
            $this->model->updateProduct($id,$newName, $newPrice);
            header('location: '.BASE_URL.'products');
        
    
        }
    }