<?php

namespace Schedule\Controller;

use \Slim\Http\Response;
use \Slim\Http\Request;

class AdminGameController extends Controller{
    
    public function index(Request $request, Response $response)
    {
        $gameList = $this->container->gameRepository->getGameList();
        $this->view->render($response, 'adminGame/index.twig', compact('gameList'));
    }
}
