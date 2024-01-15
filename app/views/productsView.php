<?php

class productsView{
    function construct(){

    }

    function showProductsList($list){
        $count = count($list);
        require './templates/products.phtml';
    }
}