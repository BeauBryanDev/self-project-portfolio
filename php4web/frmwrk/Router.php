<?php

class Router {

    protected $routes = [];

    public function __construct()   {

        $this->loadRoutes('web');

    }


    public function get( string $uri, array $action )   {

        $this->routes['GET'][$uri] = $action;

    }

    public function post( string $uri, array $action )   {

        $this->routes['POST'][$uri] = $action;

    }

    public function delete( string $uri, array $action )   {

        $this->routes['DELETE'][$uri] = $action;

    }

    public function put( string $uri, array $action )   {

        $this->routes['PUT'][$uri] = $action;

    }

    public function patch( string $uri, array $action )   {

        $this->routes['PATCH'][$uri] = $action;

    }

    public function run() {

        $requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
   
        $route =  $this->routes[$requestURI] ??  null ;

        $method =  $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; //FIT WORKS FOR GET, POST, PUT  AND DELETE SINCE NOW ON.


        $action = $this->routes[$method][$requestURI] ?? null;


        if ($action === null) {
            http_response_code(404);
            echo "404 Not Found";
            exit('Route not found ' . $method . ' ' . $requestURI);
         } //else {
           //  require_once __DIR__ . '/../' . $route;
         //}

        [$controller , $method ] = $action;

        ( new $controller())->$method();

    }

    protected function loadRoutes(string $file)
    {

        $router = $this;

        $filePath = __DIR__ . '/../routes/' . $file . '.php';

        if (file_exists($filePath)) {
            require $filePath;
        } else {
            exit('404 Not Found');
        }
    }

}
