<?php

//print("ich bin die index.php");

require_once __DIR__ . '/inc/all.php';

$container = new \App\Support\Container();

$container->add('pdo', function(){
    return require __DIR__ . '/inc/db-connect.inc.php';
});

$container->add('orderRepository', function () use($container){
    return new \App\Orders\OrderRepository($container->get('pdo'));
});

$container->add('orderController', function() use($container){
    return new \App\Controller\OrderController($container->get('orderRepository'));
});



$route = @(string) ($_GET['route'] ?? 'start');
var_dump($route);

if ($route === 'start' && !isset($GET['id'])){
    $orderController = $container->get('orderController');
    $orderController->showAllOrders();
}

elseif ($route === 'order' && isset($_GET['id'])){
    $id = @(int) ($_GET['id'] ?? 0);
    $orderController = $container->get('orderController');
    $orderController->showOrderByID($id);
}
