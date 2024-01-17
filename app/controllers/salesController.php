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
    function calcularPrecio(){

    }
    function addSale(){
        $cliente = $_POST['cliente'];
        $producto = $_POST['producto'];
        $cantidad = $_POST['cantidad'];
        
    
    
        $precio = $this->productModel->getPrice($producto);

        if(empty($cliente)||empty($producto)||empty($cantidad)){
            $this->view->showError('Debe ingresar todos los campos');
            return;
        } 
        $montoTotal = ($precio*$cantidad);
        $idSale = $this->model->addSale($cliente,$producto,$cantidad,$montoTotal);
        if($idSale){
            header('Location: '. BASE_URL .'sales');
        }
        else{
            $this->view->showError("error al insertar la venta");
        }
    }


}