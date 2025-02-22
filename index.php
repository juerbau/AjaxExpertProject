<?php

require __DIR__ . '/inc/all.php';

$container = new App\Support\Container();

$container->add('pdo', function() {
    return require __DIR__ . '/inc/db-connect.inc.php';
});

$container->add('dogRepository', function () use($container){
    return new App\Model\DogRepository($container->get('pdo'));
});

$container->add('dogController', function() use($container){
    return new App\Controller\DogController($container->get('dogRepository'));
});



$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    $dogRepository = $container->get('dogRepository');
    $myDogs = $dogRepository->allDogs();
    $res = json_encode($myDogs);
    header('Content-Type: text/html');
    echo $res;
}


