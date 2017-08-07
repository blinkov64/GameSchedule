<?php

namespace Schedule\Controller;

use Slim\Http\Request;
use Slim\Http\Response;
use Schedule\Model\AdminModel;

class AdminController {
    
    private $pdo;

    public function __construct($container)
    {
        $this->pdo = $container->pdo;
    }
        
    public function index($request, $response)
    {
        $admin = (new AdminModel($this->pdo))->getAdminLogin($request->getCookieParam('token'));
        include ROOT.'\app\view\admin\index.php';
    }
    
    public function login(Request $request, Response $responce)
    {
        $postData = $request->getParsedBody();
        if($postData)
        {
            $admin = (new AdminModel($this->pdo))->login($postData);
            if($admin)
            {
                $token = md5(uniqid(rand(), true));
                (new AdminModel($this->pdo))->setToken($token, $admin->id);
                setcookie('token', $token);
                return $responce->withRedirect('/admin');
            }
        }
        include ROOT.'\app\view\admin\login.php';
    }
    
    public function logout(Request $request, Response $response)
    {
        $token = $request->getCookieParam('token');
        (new AdminModel($this->pdo))->deleteToken($token);
        setcookie('token', '');
        return $response->withRedirect('/admin/login');
    }
}
