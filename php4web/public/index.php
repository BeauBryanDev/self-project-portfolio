<?php

require __DIR__  . '/../frmwrk/db.php';

$routes =  require __DIR__ . '/../routes/web.php';
$db = new db();

$requestURI = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$route =  $routes[$requestURI] ??  null ;
//var_dump($requestURI, $route);

if ($route === null) {

    http_response_code(404);
    echo "404 Not Found";
    exit;

} else {
    /*
    $controller = $route['controller'];
    $action = $route['action'];
    */
    require __DIR__ . "/../$route";
    //exit("404 Not Found!");

}
