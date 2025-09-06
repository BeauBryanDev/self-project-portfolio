<?php

namespace frmwrk;

use frmwrk\Middleware\Middleware;

class Router {

    //require_once __DIR__ . '/helpers.php';

    protected $routes = [];

    public function __construct()   {

        $this->loadRoutes('web');

    }


    public function get( string $uri, array $action , string | null $middleware = null )   {

        $this->routes['GET'][$uri] = [ 'action' => $action, 'middleware' => $middleware ];

    }

    public function post( string $uri, array $action , string | null $middleware = null )   {

        $this->routes['POST'][$uri] = [ 'action' => $action, 'middleware' => $middleware ];

    }

    public function delete( string $uri, array $action , string | null $middleware = null )   {

        $this->routes['DELETE'][$uri] = [ 'action' => $action, 'middleware' => $middleware ];

    }

    public function put( string $uri, array $action ,  string | null $middleware = null )   {

        $this->routes['PUT'][$uri] = [ 'action' => $action, 'middleware' => $middleware ];

    }

    public function patch( string $uri, array $action ,  string | null $middleware = null )   {

        $this->routes['PATCH'][$uri] = [ 'action' => $action, 'middleware' => $middleware ];

    }

    public function run() {

        $requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
   
        $route =  $this->routes[$requestURI] ??  null ;

        $method =  $_POST['_method'] ?? $_SERVER['REQUEST_METHOD']; //FIT WORKS FOR GET, POST, PUT  AND DELETE SINCE NOW ON.


        $action = $this->routes[$method][$requestURI]['action'] ?? null ;


        if ($action === null) {
            http_response_code(404);
            echo "404 Not Found";
            exit('Route not found ' . $method . ' ' . $requestURI);
         } //else {
           //  require_once __DIR__ . '/../' . $route;
         //}

        $middlewareClass = $this->routes[$method][$requestURI]['middleware'] ?? null;

        if ( $middlewareClass === null ) {
            // No middleware, proceed to controller action
        } else { /*
            $middleware = new $middlewareClass();
            $middleware(); */
            // Call the middleware Class in ./frmwrk/Middleware/
            Middleware::run(new $middlewareClass());
        }

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
