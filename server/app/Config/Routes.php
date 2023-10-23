<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->post('/api/create','UserController::create');
$routes->get('/api/dashboard/(:num)','PagesController::getData/$1');
$routes->post('/api/updatePage','PagesController::updatePage');
$routes->get('/api/posts/(:num)','PostController::getPosts/$1');
$routes->get('/api/getHeroPost/(:num)','PostController::getHeroPost/$1');
$routes->get('/api/getProfile/(:num)','ProfileController::getProfile/$1');
$routes->get('/api/getSettings/(:num)','CardSettingController::getSettings/$1');
$routes->get('/api/getHero/(:num)','HeroController::getHero/$1');
$routes->get('/api/getPageTitle/(:num)','ProfileController::getPageTitle/$1');
$routes->post('/api/createPage','PagesController::createNewPage');
$routes->post('/api/createPost','PostController::createPost');
$routes->post('/api/createProfile','ProfileController::createProfile');
$routes->post('/api/cardSettings','CardSettingController::cardSettings');
$routes->post('/api/createPageSetting','PageSettingController::createPageSetting');
$routes->get('/api/getPageSettings/(:num)','PageSettingController::getPageSettings/$1');
$routes->post('/api/setHero','HeroController::setHero');

$routes->delete('/api/deletePost/(:num)','PostController::deletePost/$1');

$routes->get('/api/getPageId/(:any)','EndUserController::getPageId/$1');

$routes->get('/api/(:any)','EndUserController::getUserPage/$1');
