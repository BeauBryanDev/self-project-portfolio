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
$router->delete('/projects/delete',   [ProjectsController::class, 'destroy']);
$router->delete('/home/delete', [HomeController::class,'destroy']);
$router->get('/projects/edit', [ProjectsController::class, 'edit']);
$router->put( '/projects/update', [ProjectsController::class, 'update']);
$router->get('/home/edit', [HomeController::class, 'edit']);
$router->put( '/home/update', [HomeController::class, 'update']);


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

