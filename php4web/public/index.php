<?php

require  __DIR__ . '/../bootstrap.php';

// require __DIR__  . '/../frmwrk/db.php';
// require __DIR__ . '/../frmwrk/validator.php';
// require __DIR__ . '/../frmwrk/Router.php';

// $db = new db();
use frmwrk\Router;
//$route =  $routes[$requestURI] ??  null ;
//var_dump($requestURI, $route);

$router = new Router();
//$routes =  require __DIR__ . '/../routes/web.php';
$router->run();

// if ($route === null) {

//     http_response_code(404);
//     echo "404 Not Found";
//     exit;

// } else {

//     require __DIR__ . "/../$route";