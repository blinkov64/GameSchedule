<?php

namespace Schedule\Component;

use Schedule\Model\AdminModel;
use \Schedule\Controller\Controller;
use Dflydev\FigCookies\FigResponseCookies;
use Dflydev\FigCookies\SetCookie;

class Auth extends Controller{
    
    public function login($postData)
    {
        $response = $this->container->response;
        $admin = (new AdminModel($this->pdo))->login($postData);
        if($admin)
        {
            $token = md5(uniqid(rand(), true));
            (new AdminModel($this->pdo))->setToken($token, $admin->id);
            $setCookie = SetCookie::create('token')->withValue($token);
            $response = FigResponseCookies::set($response, $setCookie);
            return $response;
        }
        return $response;
    }
    
    public function logout()
    {
        $token = $this->container->request->getCookieParam('token');
        (new AdminModel($this->pdo))->deleteToken($token);
        $response = FigResponseCookies::expire($this->container->response, 'token');
        return $response;
    }
}