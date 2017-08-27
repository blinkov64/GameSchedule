<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

define('ROOT', dirname(__DIR__));

require ROOT.'/vendor/autoload.php';

$app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
]);

require ROOT.'/app/dependencies.php';

//require ROOT.'/app/middleware.php';

require ROOT.'/app/routes.php';

$app->run();

