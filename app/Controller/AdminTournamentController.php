<?php

namespace Schedule\Controller;

use \Slim\Http\Response;
use \Slim\Http\Request;
use \Respect\Validation\Validator;

class AdminTournamentController extends Controller{
    
    public function index(Request $request, Response $response)
    {
        $tournamentList = $this->container->tournamentRepository->getTournamentList();
        $this->view->render($response, 'adminTournament/index.twig', compact('tournamentList'));
    }
    
    public function getCreate(Request $request, Response $response)
    {
        $this->view->render($response, 'adminTournament/create.twig');
    }
    
    public function postCreate(Request $request, Response $response)
    {
        $properties = $request->getParsedBody();
        $tournamentModel = $this->container->createModel->create('TournamentModel', $properties);
        $tournamentId = $this->container->tournamentRepository->createTournament($tournamentModel);
        $this->container->uploadFile->upload($request, $tournamentId, 'tournament');
        return $response->withRedirect($this->router->pathFor('tournament'));
    }
    
    public function getUpdate(Request $request, Response $response, $args)
    {
        $tournamenId = $args['id'];
        $properties['id'] = $tournamenId;
        
        $tournamenModel = $this->container->createModel->create('TournamentModel', $properties);
        $tournament = $this->container->tournamentRepository->getTournament($tournamenModel);
        $this->view->render($response, 'adminTournament/update.twig',
                compact('tournamenId', 'tournament'));
    }
    
    public function putUpdate(Request $request, Response $response, $args)
    {
        $postData = $request->getParsedBody();
        
        $tournamentId = $args['id'];
        
        if($postData)
        {
            $rules = [
                'name' => Validator::notEmpty()->length(3, 30),
                'active' => Validator::numeric()
            ];
            $err = $this->container->validation->validate($rules, $request);
            
            if(!$err)
            {
                $this->container->uploadFile->upload($request, $tournamentId, 'tournament');
                $properties = $postData;
                $properties['id'] = $tournamentId;
                $tournamentModel = $this->container->createModel->create('TournamentModel', $properties);
                $place = $this->container->tournamentRepository->updateTournament($tournamentModel);
                return $response->withRedirect($this->router->pathFor('tournament'));
            }
            
        }
        
        $this->view->render($response, 'adminTournament/update.twig',
                compact('tournamenId', 'err', 'postData'));
    }
}
