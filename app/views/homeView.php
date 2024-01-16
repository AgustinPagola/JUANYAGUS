<?php

class homeView{
    function construct(){

    }
    function showHome(){
        require './templates/home.phtml';
    }
    public function showError($error) {
        require './templates/error.phtml';
    }
}