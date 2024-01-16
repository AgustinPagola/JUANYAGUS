<?php

require_once './app/views/homeView.php';
    class homeController{
        private $view;

        function __construct(){
            $this->view = new homeView();

        }
        function showHome(){
            if(AuthHelper::checkLogin()){
                $this->view->showHome();
            }
            else{
                $this->view->showHomeAdmin();
            }
    }
}