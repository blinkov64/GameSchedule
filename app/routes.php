<?php

use \Schedule\Controller\ScheduleController;
use Schedule\Controller\AdminController;
use \Schedule\Controller\AdminPlaceController;
use Schedule\Controller\AdminTournamentController;
use Schedule\Controller\AdminTeamController;
use Schedule\Controller\AdminGameController;

$app->get('/', ScheduleController::class.':index');
$app->group('/admin', function()
{
    //$app->map(['GET', 'POST'], '/login', AdminController::class.':login');
    $this->get('/login', AdminController::class.':getLogin')->setName('getLogin');
    $this->post('/login', AdminController::class.':postLogin');
    $this->get('/logout', AdminController::class.':logout')->setName('logout');
    $this->get('', AdminController::class.':index')->setName('admin');
    $this->get('/place', AdminPlaceController::class.':index')->setName('place');
    //$app->map(['GET', 'POST'], '/place/create', AdminPlaceController::class.':create');
    $this->get('/place/create', AdminPlaceController::class.':getCreate')->setName('createPlace');
    $this->post('/place/create', AdminPlaceController::class.':postCreate');
    $this->get('/place/update/{id:[0-9]+}', AdminPlaceController::class.':getUpdate')->setName('update');
    $this->put('/place/update/{id:[0-9]+}', AdminPlaceController::class.':putUpdate');
    
    $this->get('/tournament', AdminTournamentController::class.':index')->setName('tournament');
    $this->get('/tournament/create', AdminTournamentController::class.':getCreate')->setName('createTournament');
    $this->post('/tournament/create', AdminTournamentController::class.':postCreate');
    $this->get('/tournament/update/{id:[0-9]+}', AdminTournamentController::class.':getUpdate')->setName('updateTournament');
    $this->put('/tournament/update/{id:[0-9]+}', AdminTournamentController::class.':putUpdate');
    
    $this->get('/team', AdminTeamController::class.':index')->setName('team');
    $this->get('/team/create', AdminTeamController::class.':getCreate')->setName('createTeam');
    $this->post('/team/create', AdminTeamController::class.':postCreate');
    $this->get('/team/update/{id:[0-9]+}', AdminTeamController::class.':getUpdate')->setName('updateTeam');
    $this->put('/team/update/{id:[0-9]+}', AdminTeamController::class.':putUpdate');
    
    $this->get('/game', AdminGameController::class.':index')->setName('game');
})->add( new \Schedule\Middleware\AdminMW($container) );