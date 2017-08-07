<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

define('ROOT',dirname(__FILE__));

require 'vendor/autoload.php';

$app = new \Slim\App([
        'settings' => [
            'displayErrorDetails' => true
        ]
]);

require 'app/dependencies.php';

require 'app/middleware.php';

require 'app/routes.php';

$app->run();

