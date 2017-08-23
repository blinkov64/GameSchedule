<?php

namespace Schedule\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
//use \Psr\Http\Message\ResponseInterface as Response;
use Schedule\Model\AdminModel;

class AdminController extends Controller{
    
    public function index($request, $response)
    {
        $admin = (new AdminModel($this->pdo))->getAdminLogin($request->getCookieParam('token'));
        $this->view->render($response, 'admin/index.twig', ['admin'=>$admin]);
    }
    
    public function getLogin(Request $request, Response $responce)
    {
        $this->view->render($responce, 'admin/login.twig');
    }
    
    public function postLogin(Request $request, Response $responce)
    {
        /*$postData = $request->getParsedBody();
        $admin = (new AdminModel($this->pdo))->login($postData);
        if($admin)
        {
            $token = md5(uniqid(rand(), true));
            (new AdminModel($this->pdo))->setToken($token, $admin->id);
            $setCookie = SetCookie::create('token')->withValue($token);
            $responce = FigResponseCookies::set($responce, $setCookie);
            //setcookie('token', $token);
            echo '<pre>';
            var_dump($responce);
            echo '</pre>';
            die();
            return $responce->withRedirect($this->router->pathFor('admin'));
        }*/
        $response = $this->container->auth->login($request->getParsedBody());
        if($response->getHeader('Set-Cookie'))
        {
            return $response->withRedirect($this->router->pathFor('admin'));
        }
        return $responce->withRedirect($this->router->pathFor('getLogin'));        
    }
    public function logout(Request $request, Response $response)
    {
        $response = $this->container->auth->logout();
        return $response->withRedirect($this->router->pathFor('getLogin'));
    }
}
