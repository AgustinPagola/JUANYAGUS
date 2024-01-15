<?php

class clientsView{
    function construct(){

    }
    function showClients($list){
        $count = count($list);
        require './templates/clients.phtml';
    }
}