<?php

require __DIR__ . '/inc/all.php';


$container = new App\Support\Container();

$container->add('pdo', function() {
    return require __DIR__ . '/inc/db-connect.inc.php';
});

$container->add('productRepository', function () use($container){
    return new App\Model\ProductRepository($container->get('pdo'));
});

$container->add('productController', function() use($container){
    return new App\Controller\ProductController($container->get('productRepository'));
});


$productController = $container->get('productController');
$productController->showAllProducts();


