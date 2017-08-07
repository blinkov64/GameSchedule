<?php

$app->get('/', 'ScheduleController:index');
$app->group('/admin', function() use($app)
{
    $app->map(['GET', 'POST'], '/login', 'AdminController:login');
    $app->get('/logout', 'AdminController:logout');
    $app->get('', 'AdminController:index');
    $app->get('/place', 'AdminPlaceController:index');
    $app->map(['GET', 'POST'], '/place/create', 'AdminPlaceController:create');
    //$app->post('/place/create', 'AdminPlaceController:create');
    $app->map(['GET', 'PUT'], '/place/update/{id:[0-9]+}', 'AdminPlaceController:update');
    //$app->put('/place/update/{id:[0-9]+}', 'AdminPlaceController:update');
})->add($isAdminMV);