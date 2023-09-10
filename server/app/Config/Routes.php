<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->post('/api/create','UserController::create');
$routes->get('/api/dashboard/(:num)','PagesController::getData/$1');
$routes->get('/api/posts/(:num)','PostController::getPosts/$1');
$routes->get('/api/(:any)','EndUserController::getUserPage/$1');

