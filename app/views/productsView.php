<?php

class productsView{
    function construct(){

    }
    function showProductsOfflineList($list){
        $count = count($list);
        require './templates/productsOffline.phtml';
    }
    function showProductsList($list){
        $count = count($list);
        require './templates/products.phtml';
    }
    public function showError($error) {
        require './templates/error.phtml';
    }
    public function editProduct($idProduct,$product){
    
        require './templates/productsUpdate.phtml';
    }
}