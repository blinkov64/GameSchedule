<?php

namespace Schedule\Controller;

//use \Psr\Http\Message\ServerRequestInterface as Request;
//use \Psr\Http\Message\ResponseInterface as Response;
use \Slim\Http\Response;
use \Slim\Http\Request;
use Schedule\Model\PlaceModel;
use \Respect\Validation\Validator;

class AdminPlaceController {
    
    private $pdo;

    public function __construct($container)
    {
        $this->pdo = $container->pdo;
    }

    public function index()
    {
        $placeList = (new PlaceModel($this->pdo))->getPlaceList();
        include ROOT.'\app\view\adminPlace\index.php';
    }
    
    public function create(Request $request, Response $response, $args)
    {
        $postData = $request->getParsedBody();
        if($postData)
        {
            $place = (new PlaceModel($this->pdo))->createPlace($postData);
            return $response->withRedirect('/admin/place');
        }
        include ROOT.'\app\view\adminPlace\create.php';
    }
    
    public function update(Request $request, Response $response, $args)
    {
        $postData = $request->getParsedBody();
        
        $placeNameError = '';
        $placeAddressError = '';
        $placeActiveError = '';
        
        $placeNameInput = '';
        $placeAddressInput = '';
        $placeActiveInput = '';
        
        $placeId = $request->getAttribute('id');
        
        if($postData)
        {
            
            try
            {
                Validator::notEmpty()->length(3, 10)->assert($postData['name']);
            }
            catch (\Respect\Validation\Exceptions\NestedValidationException $ex)
            {
                
                $placeNameError = preg_replace('/".*"/', '', $ex->getMessages()[0]);
            }
            try
            {
                Validator::notEmpty()->assert($postData['address']);
            }
            catch (\Respect\Validation\Exceptions\NestedValidationException $ex)
            {
                $placeAddressError = preg_replace('/".*"/', '', $ex->getMessages()[0]);
            }
            try
            {
                Validator::numeric()->assert($postData['active']);
            }
            catch (\Respect\Validation\Exceptions\NestedValidationException $ex)
            {
                $placeActiveError = preg_replace('/".*"/', '', $ex->getMessages()[0]);
            }
            
            if(!($placeNameError || $placeAddressError || $placeActiveError))
            {
                $place = (new PlaceModel($this->pdo))->updatePlace($placeId, $postData);
                return $response->withRedirect('/admin/place');
            }
            else
            {
                $placeNameInput = $postData['name'];
                $placeAddressInput = $postData['address'];
                $placeActiveInput = $postData['active'];
            }
        }
        
        if($request->getMethod() == 'GET')
        {
            $place = (new PlaceModel($this->pdo))->getPlace($placeId);
        }
        
        include ROOT.'\app\view\adminPlace\update.php';
    }
}
