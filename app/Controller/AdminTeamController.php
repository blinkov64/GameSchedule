<?php

namespace Schedule\Controller;

use \Slim\Http\Response;
use \Slim\Http\Request;
use \Respect\Validation\Validator;

class AdminTeamController extends Controller{
    
    public function index(Request $request, Response $response)
    {
        $teamList = $this->container->teamRepository->getTeamList();
        $this->view->render($response, 'adminTeam/index.twig', compact('teamList'));
    }
    
    public function getCreate(Request $request, Response $response)
    {
        $this->view->render($response, 'adminTeam/create.twig');
    }
    
    public function postCreate(Request $request, Response $response)
    {
        $properties = $request->getParsedBody();
        $teamModel = $this->container->createModel->create('TeamModel', $properties);
        $teamId = $this->container->teamRepository->createTeam($teamModel);
        $this->container->uploadFile->upload($request, $teamId, 'team');
        return $response->withRedirect($this->router->pathFor('team'));
    }
    
    public function getUpdate(Request $request, Response $response, $args)
    {
        $teamId = $args['id'];
        $properties['id'] = $teamId;
        
        $teamModel = $this->container->createModel->create('TeamModel', $properties);
        $team = $this->container->teamRepository->getTeam($teamModel);
        $this->view->render($response, 'adminTeam/update.twig',
                compact('teamId', 'team'));
    }
    
    public function putUpdate(Request $request, Response $response, $args)
    {
        $postData = $request->getParsedBody();
        
        $teamId = $args['id'];
        
        if($postData)
        {
            $rules = [
                'name' => Validator::notEmpty()->length(3, 30),
                'active' => Validator::numeric()
            ];
            $err = $this->container->validation->validate($rules, $request);
            
            if(!$err)
            {
                $this->container->uploadFile->upload($request, $teamId, 'team');
                $properties = $postData;
                $properties['id'] = $teamId;
                $teamModel = $this->container->createModel->create('TeamModel', $properties);
                $place = $this->container->teamRepository->updateTeam($teamModel);
                return $response->withRedirect($this->router->pathFor('team'));
            }
            
        }
        
        $this->view->render($response, 'adminTeam/update.twig',
                compact('teamId', 'err', 'postData'));
    }
}
