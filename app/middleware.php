<?php

use Schedule\Model\AdminModel;

$isAdminMV = function (\Slim\Http\Request$request, \Slim\Http\Response $response, $next) use($container) {
    $uri = $request->getRequestTarget();
    $token = $request->getCookieParam('token');
    if($uri != '/admin/login' && $uri != '/admin/login' && !$token)
    {
        $admin = (new AdminModel($container->pdo))->isAdmin($token);
        
        if(!$admin)
        {
            return $response->withRedirect('/admin/login');
        }
    }
    $response = $next($request, $response);
    return $response;
    
};