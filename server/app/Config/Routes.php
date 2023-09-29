<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->post('/api/create','UserController::create');
$routes->get('/api/dashboard/(:num)','PagesController::getData/$1');
$routes->get('/api/posts/(:num)','PostController::getPosts/$1');
$routes->get('/api/getHeroPost/(:num)','PostController::getHeroPost/$1');
$routes->get('/api/getProfile/(:num)','ProfileController::getProfile/$1');
$routes->get('/api/getSettings/(:num)','CardSettingController::getSettings/$1');
$routes->get('/api/getHero/(:num)','HeroController::getHero/$1');
$routes->post('/api/createPage','PagesController::createNewPage');
$routes->post('/api/createPost','PostController::createPost');
$routes->post('/api/createProfile','ProfileController::createProfile');
$routes->post('/api/cardSettings','CardSettingController::cardSettings');
$routes->post('/api/setHero','HeroController::setHero');
$routes->get('/api/(:any)','EndUserController::getUserPage/$1');
