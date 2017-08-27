<?php

$container = $app->getContainer();

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(ROOT.'/View', [
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
    return new \Schedule\Model\Repository\PlaceRepository($container);
};

$container['createModel'] = function ($container) {
    return new \Schedule\Component\CreateModel($container);
};

$container['tournamentRepository'] = function ($container) {
    return new \Schedule\Model\Repository\TournamentRepository($container);
};

$container['uploadFile'] = function () {
    return new \Schedule\Component\UploadFile();
};

$container['teamRepository'] = function ($container) {
    return new \Schedule\Model\Repository\TeamRepository($container);
};

$container['gameRepository'] = function ($container) {
    return new \Schedule\Model\Repository\GameRepository($container);
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