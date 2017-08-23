<?php

use \Schedule\Controller\ScheduleController;
use Schedule\Controller\AdminController;
use \Schedule\Controller\AdminPlaceController;

$app->get('/', ScheduleController::class.':index');
$app->group('/admin', function() use($app)
{
    //$app->map(['GET', 'POST'], '/login', AdminController::class.':login');
    $app->get('/login', AdminController::class.':getLogin')->setName('getLogin');
    $app->post('/login', AdminController::class.':postLogin');
    $app->get('/logout', AdminController::class.':logout')->setName('logout');
    $app->get('', AdminController::class.':index')->setName('admin');
    $app->get('/place', AdminPlaceController::class.':index')->setName('place');
    //$app->map(['GET', 'POST'], '/place/create', AdminPlaceController::class.':create');
    $app->get('/place/create', AdminPlaceController::class.':getCreate')->setName('create');
    $app->post('/place/create', AdminPlaceController::class.':postCreate');
    $app->get('/place/update/{id:[0-9]+}', AdminPlaceController::class.':getUpdate')->setName('update');
    $app->put('/place/update/{id:[0-9]+}', AdminPlaceController::class.':putUpdate');
})->add($isAdminMV);