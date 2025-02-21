<?php

require_once __DIR__ . '/inc/all.php';

$container = new \Grundlagen\cms\src\Support\Container();
$container->add('pdo', function() {
    return require __DIR__ . '/inc/db-connect.inc.php';
});
$container->add('pagesRepository', function() use($container) {
    return new \Grundlagen\cms\src\Pages\PagesRepository($container->get('pdo'));
});
$container->add('pagesController', function() use($container) {
    return new \Grundlagen\cms\src\Controller\PagesController(
        $container->get('pagesRepository')
    );
});
$container->add('pagesAdminController', function() use($container) {
    return new \App\Controller\Admin\PagesAdminController(
        $container->get('pagesRepository')
    );
});
$container->add('notFoundController', function() use($container) {
    return new \Grundlagen\cms\src\Controller\NotFoundController(
        $container->get('pagesRepository')
    );
});
$container->add('loginController', function() use($container) {
    return new \App\Controller\Admin\LoginController(
        $container->get('pagesRepository'),
        $container->get('authService')
    );
});
$container->add('authService', function() use($container) {
    return new \Grundlagen\cms\src\Support\AuthService(
        $container->get('pdo')
    );
});
$container->add('csrfHelper', function() {
    return new \App\Support\CsrfHelper();
});


$csrfHelper = $container->get('csrfHelper');
$csrfHelper->handle();

function csrf_token() {
    global $container;
    $csrfHelper = $container->get('csrfHelper');
    return $csrfHelper->generateToken();
}


// var_dump($container->get('pagesController'));
// die();

$route = @(string) ($_GET['route'] ?? 'page');

if ($route === 'page') {
    // var_dump("Gebe hier doch bitte die Startseite aus...");
    /** @var \Grundlagen\cms\src\Controller\PagesController $pagesController */
    $pagesController = $container->get('pagesController');
    $page = @(string) ($_GET['page'] ?? 'index');
    $pagesController->showPage($page);
} 
else if ($route === 'admin/login') {
    $loginController = $container->get('loginController');
    $loginController->login();
}
else if ($route === 'admin/logout') {
    $loginController = $container->get('loginController');
    $loginController->logout();
}
else if ($route === 'admin/page') {
    $authService = $container->get('authService');
    $authService->ensureLogin();

    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->index();
}
else if ($route === 'admin/page/create') {
    $authService = $container->get('authService');
    $authService->ensureLogin();

    $pagesAdminController = $container->get('pagesAdminController');
    $pagesAdminController->create();
}
else if ($route === 'admin/page/delete') {
    $authService = $container->get('authService');
    $authService->ensureLogin();

    $pagesAdminController = $container->get('pagesAdminController');
    $id = @(int) ($_POST['id'] ?? 0);
    $pagesAdminController->delete($id);
}
else if ($route === 'admin/page/edit') {
    $authService = $container->get('authService');
    $authService->ensureLogin(); 

    $pagesAdminController = $container->get('pagesAdminController');
    $id = @(int) ($_GET['id'] ?? 0);
    $pagesAdminController->edit($id);
}
else {
    // var_dump("Hier gebe die Fehlerseite aus (Error 404)");

    $notFoundController = $container->get('notFoundController');
    $notFoundController->error404();
}