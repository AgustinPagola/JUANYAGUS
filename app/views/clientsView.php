<?php

class clientsView{
    function construct(){

    }
    function showClients($list){
        $count = count($list);
        require './templates/clients.phtml';
    }
    public function showError($error) {
        require './templates/error.phtml';
    }
    function showClient($id, $list){
        $count = count($list);
        require './templates/client.phtml';
    }
}