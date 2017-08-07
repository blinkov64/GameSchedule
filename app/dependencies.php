<?php

$container = $app->getContainer();

$container['pdo'] = function () {
    $dns = 'mysql: host=localhost;dbname=gameschedule';
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
    ];
    $pdo = new PDO($dns, 'root', '', $options);
    return $pdo;
};

$container['ScheduleController'] = function ($container) {
    return new \Schedule\Controller\ScheduleController();
};

$container['AdminController'] = function ($container) {
    return new \Schedule\Controller\AdminController($container);
};

$container['AdminPlaceController'] = function ($container) {
    return new \Schedule\Controller\AdminPlaceController($container);
};