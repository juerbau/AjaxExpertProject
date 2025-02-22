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
$dogRepository = $container->get('dogRepository');

if ($method == 'GET') {
    $myDogs = $dogRepository->allDogs();
    $res = json_encode($myDogs);
    header('Content-Type: text/html');
    echo $res;
} elseif ($method == 'POST'){
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $addNewDog = $dogRepository->addDog($data);
    echo $addNewDog;
} elseif ($method == 'DELETE'){
    $id = $_GET['id'];
    $dogRepository->delete($id);
    echo "the dog with the id={$id} was deleted";
}


