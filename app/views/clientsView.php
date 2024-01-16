<?php

class clientsView{
    function construct(){

    }
    function showClients($list){
        $count = count($list);
        require './templates/clients.phtml';
    }
    function showClientsOffline($list){
        $count = count($list);
        require './templates/clientsOffline.phtml';
    }
    public function showError($error) {
        require './templates/error.phtml';
    }
    function getClient($id, $list){
        $count = count($list);
        require './templates/client.phtml';
    }
}