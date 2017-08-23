<?php

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(ROOT.'/app/View', [
        'cache' => false
    ]);
    
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

$container['pdo'] = function () {
    $dns = 'mysql: host=localhost;dbname=gameschedule';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    $pdo = new PDO($dns, 'root', '', $options);
    return $pdo;
};

$container['auth'] = function ($container) {
    return new \Schedule\Component\Auth($container);
};

$container['validation'] = function ($container) {
    return new \Schedule\Component\Validation($container);
};

$container['placeRepository'] = function ($container) {
    return new \Schedule\Model\Place\PlaceRepository($container);
};

/*$container['ScheduleController'] = function ($container) {
    return new \Schedule\Controller\ScheduleController();
};

$container['AdminController'] = function ($container) {
    return new \Schedule\Controller\AdminController($container);
};

$container['AdminPlaceController'] = function ($container) {
    return new \Schedule\Controller\AdminPlaceController($container);
};*/