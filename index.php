<?php

require __DIR__ . '/inc/all.php';

$container = new App\Support\Container();

$container->add('pdo', function() {
    return require __DIR__ . '/inc/db-connect.inc.php';
});

$container->add('dogRepository', function () use($container){
    return new App\Model\DogRepository($container->get('pdo'));
});


$method = $_SERVER['REQUEST_METHOD'];
$dogRepository = $container->get('dogRepository');


if($method == 'GET' && !isset($_GET['id'])) {
    $myDogs = $dogRepository->allDogs();
    $res = json_encode($myDogs);
    header('Content-Type: text/html');
    echo $res;
} elseif($method == 'GET' && isset($_GET['id'])){
    $id = $_GET['id'];
    $myDog = $dogRepository->oneDog($id);
    $res = json_encode($myDog);
    header('Content-Type: text/html');
    echo $res;
} elseif ($method == 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    $addNewDog = $dogRepository->addDog($data);
    echo $addNewDog;
} elseif($method == 'PUT' && isset($_GET['id'])){
    $id = $_GET['id'];
    $json = file_get_contents('php://input');
    $updateDog = json_decode($json, true);
    $res = $dogRepository->updateDog($id, $updateDog);
    header('Content-Type: text/html');
    echo $res;
}elseif ($method == 'DELETE'){
    $id = $_GET['id'];
    $dogRepository->delete($id);
    echo "the dog with the id={$id} was deleted";
}
