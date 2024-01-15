<?php
require_once './app/controllers/productsController.php';
require_once './app/controllers/homeController.php';
require_once './app/controllers/clientsController.php';
require_once './app/controllers/salesController.php';

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
    case 'sales':
        $controller = new salesController();
        $controller -> showSales();
        break;

}