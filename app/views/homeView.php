<?php

class homeView{
    function construct(){

    }
    function showHome(){
        require './templates/home.phtml';
    }
     function showHomeAdmin(){
        require './templates/homeAdmin.phtml';
    }
    public function showError($error) {
        require './templates/error.phtml';
    }
}