<?php

namespace Schedule\Controller;

class Controller {
    
    protected $pdo;
    protected $view;
    protected $router;
    protected $container;

    public function __construct($container)
    {
        $this->pdo = $container->pdo;
        $this->view = $container->view;
        $this->router = $container->router;
        $this->container = $container;
    }
}
