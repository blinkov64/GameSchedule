<?php

namespace Schedule\Controller;

//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Http\Response;
use \Slim\Http\Request;
//use Schedule\Model\PlaceModel;
use \Respect\Validation\Validator;

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
        $postData = $request->getParsedBody();
        //$place = (new PlaceModel($this->pdo))->createPlace($postData);
        $place = $this->container->placeRepository->createPlace($postData);
        return $response->withRedirect($this->router->pathFor('place'));
    }
    
    public function getUpdate(Request $request, Response $response)
    {
        $placeId = $request->getAttribute('id');
        //$place = (new PlaceModel($this->pdo))->getPlace($placeId);
        $place = $this->container->placeRepository->getPlace($placeId);
        $this->view->render($response, 'adminPlace/update.twig',
                compact('placeId', 'place'));
    }
    
    public function putUpdate(Request $request, Response $response)
    {
        $postData = $request->getParsedBody();
        
        $placeId = $request->getAttribute('id');
        
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
                //$place = (new PlaceModel($this->pdo))->updatePlace($placeId, $postData);
                $place = $this->container->placeRepository->updatePlace($placeId, $postData);
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
