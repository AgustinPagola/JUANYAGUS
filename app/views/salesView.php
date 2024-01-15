<?php
class salesView{
    function __construct(){
        }

       function showSales($list, $clients, $products){
        $count = count($list);
        $count = count($clients);
        $count = count($products);
        require './templates/sales.phtml';
       } 
}