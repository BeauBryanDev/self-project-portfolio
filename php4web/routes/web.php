<?php


use App\Controllers\AboutMeController;
use App\Controllers\BlogController;
use App\Controllers\HomeController;
use App\Controllers\ProjectsController;
use App\Controllers\PostController;
use App\Controllers\ContactController;
use App\Controllers\AuthController;
use frmwrk\Middleware\Authenticated;

require_once __DIR__. '/../app/Controllers/AboutMeController.php';
require_once __DIR__.'/../app/Controllers/ProjectsController.php';
require_once __DIR__.'/../app/Controllers/BlogController.php';
require_once __DIR__ .'/../app/Controllers/HomeController.php';
require_once __DIR__ . '/../app/Controllers/PostController.php';
require_once __DIR__.'/../app/Controllers/ContactController.php';
require_once __DIR__.'/../app/Controllers/AuthController.php';
//require_once __DIR__.'/../app/Controllers/CreateProjectController.php';

//routers  ...

$router->get('/',               [HomeController::class, 'index']);
$router->get('/aboutMe',        [AboutMeController::class, 'index']);
$router->get('/projects',       [ProjectsController::class, 'index']);
$router->get('/blog',           [BlogController::class, 'index']);
$router->get('/post',           [PostController::class, 'show']);
$router->get('/contact',        [ContactController::class, 'index']);
$router->get( '/login',   [AuthController::class, 'login']);
$router->post('/login',  [ AuthController::class, 'authenticate' ]);
$router->post('/logout', [ AuthController::class, 'logout'], Authenticated::class );

$router->get('/projects/create',[ProjectsController::class, 'create'],  Authenticated::class);
$router->get('/posts/create', [ HomeController::class, 'create'], Authenticated::class);
$router->post('/projects/store', [ProjectsController::class, 'store'], Authenticated::class);
$router->delete('/projects/delete',   [ProjectsController::class, 'destroy'], Authenticated::class);
$router->delete('/home/delete', [HomeController::class,'destroy'], Authenticated::class);
$router->get('/projects/edit', [ProjectsController::class, 'edit'], Authenticated::class);
$router->put( '/projects/update', [ProjectsController::class, 'update'], Authenticated::class);
$router->get('/home/edit', [HomeController::class, 'edit'], Authenticated::class);
$router->put( '/home/update', [HomeController::class, 'update'], Authenticated::class);


// $userViews =

//     '/'          => 'app/Controllers/home.php',
//     '/post'      => 'app/Controllers/post.php',
//     '/aboutMe'   => 'app/Controllers/aboutMe.php',
//     '/projects'  => 'app/Controllers/projects.php',
//     '/blog'      => 'app/Controllers/blog.php',
//     '/contact'   => 'app/Controllers/contact.php',
//     '/projects/create' => 'app/Controllers/create_project.php',

// ];

//return $userViews;
