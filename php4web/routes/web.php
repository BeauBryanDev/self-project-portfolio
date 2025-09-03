<?php

require_once __DIR__. '/../app/Controllers/AboutMeController.php';
require_once __DIR__.'/../app/Controllers/ProjectsController.php';
require_once __DIR__.'/../app/Controllers/BlogController.php';
require_once __DIR__ .'/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/PostController.php';
require_once __DIR__.'/../app/Controllers/ContactController.php';
//require_once __DIR__.'/../app/Controllers/CreateProjectController.php';


//routers  ...

$router->get('/',               [HomeController::class, 'index']);
$router->get('/aboutMe',        [AboutMeController::class, 'index']);
$router->get('/projects',       [ProjectsController::class, 'index']);
$router->get('/blog',           [BlogController::class, 'index']);
$router->get('/post',           [PostController::class, 'show']);
$router->get('/contact',        [ContactController::class, 'index']);
$router->get('/projects/create',[ProjectsController::class, 'create']);
$router->post('/projects/store', [ProjectsController::class, 'store']);


// $userViews = [

//     '/'          => 'app/Controllers/home.php',
//     '/post'      => 'app/Controllers/post.php',
//     '/aboutMe'   => 'app/Controllers/aboutMe.php',
//     '/projects'  => 'app/Controllers/projects.php',
//     '/blog'      => 'app/Controllers/blog.php',
//     '/contact'   => 'app/Controllers/contact.php',
//     '/projects/create' => 'app/Controllers/create_project.php',

// ];

//return $userViews;

