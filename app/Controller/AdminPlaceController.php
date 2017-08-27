<?php

namespace Schedule\Controller;

//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Http\Response;
use \Slim\Http\Request;
//use Schedule\Model\PlaceModel;
use \Respect\Validation\Validator;
use \Schedule\Model\PlaceModel;

class AdminPlaceController extends Controller{
    
    public function index(Request $request, Response $response)
    {
        //$placeList = (new PlaceModel($this->pdo))->getPlaceList();
        $placeList = $this->container->placeRepository->getPlaceList();
        $this->view->render($response, 'adminPlace/index.twig', compact('placeList'));
    }
    
    public function getCreate(Request $request, Response $response)
    {
        $this->view->render($response, 'adminPlace/create.twig');
    }
    
    public function postCreate(Request $request, Response $response)
    {
        //$postData = $request->getParsedBody();
        //$place = (new PlaceModel($this->pdo))->createPlace($postData);
        $properties = $request->getParsedBody();
        $placeModel = $this->container->createModel->create('PlaceModel', $properties);
        $place = $this->container->placeRepository->createPlace($placeModel);
        return $response->withRedirect($this->router->pathFor('place'));
    }
    
    public function getUpdate(Request $request, Response $response, $args)
    {
        $placeId = $args['id'];
        $properties['id'] = $placeId;
        //$place = (new PlaceModel($this->pdo))->getPlace($placeId);
        /*$placeModel = new PlaceModel;
        $placeModel->setId($placeId);*/
        $placeModel = $this->container->createModel->create('PlaceModel', $properties);
        $place = $this->container->placeRepository->getPlace($placeModel);
        $this->view->render($response, 'adminPlace/update.twig',
                compact('placeId', 'place'));
    }
    
    public function putUpdate(Request $request, Response $response, $args)
    {
        $postData = $request->getParsedBody();
        
        $placeId = $args['id'];
        
        if($postData)
        {
            $rules = [
                'name' => Validator::notEmpty()->length(3, 10),
                'address' => Validator::notEmpty(),
                'active' => Validator::numeric()
            ];
            $err = $this->container->validation->validate($rules, $request);
            
            if(!$err)
            {
                /*$placeModel = new PlaceModel;
                $placeModel->setId($placeId);
                $placeModel->setName($postData['name']);
                $placeModel->setAddress($postData['address']);
                $placeModel->setActive($postData['active']);*/
                //$place = (new PlaceModel($this->pdo))->updatePlace($placeId, $postData);
                $properties = $postData;
                $properties['id'] = $placeId;
                $placeModel = $this->container->createModel->create('PlaceModel', $properties);
                $place = $this->container->placeRepository->updatePlace($placeModel);
                return $response->withRedirect($this->router->pathFor('place'));
            }
            
        }
        
        /*if($request->getMethod() == 'GET')
        {
            $place = (new PlaceModel($this->pdo))->getPlace($placeId);
        }*/
        
        $this->view->render($response, 'adminPlace/update.twig',
                compact('placeId', 'err', 'postData'));
    }
}
