<?php

require __DIR__  . '/../frmwrk/db.php';

$routes =  require __DIR__ . '/../routes/web.php';
$db = new db();

$requestURI = $_SERVER['REQUEST_URI'];

$route =  $routes[$requestURI] ??  null ;


if ($route === null) {
    http_response_code(404);
    echo "404 Not Found";
    exit;
} else {
    require __DIR__ . "/../$route";
    //exit("404 Not Found!");

}
