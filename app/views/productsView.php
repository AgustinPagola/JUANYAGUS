<?php

class productsView{
    function construct(){

    }

    function showProductsList($list){
        $count = count($list);
        require './templates/products.phtml';
    }
    public function showError($error) {
        require './templates/error.phtml';
    }
}