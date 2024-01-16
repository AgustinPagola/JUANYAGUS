<?php
require_once './app/controllers/productsController.php';
require_once './app/controllers/homeController.php';
require_once './app/controllers/clientsController.php';
require_once './app/controllers/salesController.php';
require_once './app/controllers/authController.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
// parsea la accion para separar accion real de parametros
$params = explode('/', $action);
switch ($params[0]) {
    case 'home':
            $controller = new homeController();
            $controller->showHome();
        break;

    case 'products':
        $controller = new productsController();
        $controller-> showProducts();
        break;

    case 'clients':
        $controller = new clientsController();
        $controller ->showClients();   
        break;
    case 'addClient':
        $controller = new clientsController();
        $controller -> addClient($params[1]);
        break;
    case 'deleteClient':
        $controller = new clientsController();
        $controller -> removeClient($params[1]);
        break;
    case 'getClient':
        $controller = new clientsController();
        $controller -> getClient($params[1]);
        break;
    case 'updateClient':
        $controller = new clientsController();
        $controller -> updateClient($params[1]);
        break;    
            
    case 'sales':
        $controller = new salesController();
        $controller -> showSales();
        break;
    case 'addProduct':
        $controller = new productsController();
        $controller -> addProduct($params[1]);
        break;
    case 'deleteProduct':
        $controller = new productsController();
        $controller -> removeProduct($params[1]);
        break;   
    case'editProduct':
        $controller = new productsController();
        $controller ->editProduct($params[1]);
        break;
    case 'updateProduct':
        $controller = new productsController();
        $controller ->updateProduct($params[1]);
        break;
    case 'login':
        $controller = new authController();
        $controller->showLogin(); 
        break;
    case 'auth':
        $controller = new authController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new authController();
        $controller->logout();
        break;

}