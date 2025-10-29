<?php

use CodeIgniter\Router\RouteCollection;

$routes->get('/', 'Home::index');

$routes->group('sewadar', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'SewadarController::index');
    $routes->get('manage', 'SewadarController::manage');
    $routes->match(['get', 'post'], 'manage/(:any)', 'SewadarController::manage/$1');
});

$routes->group('api', ['namespace' => 'App\Controllers\API'], function($routes) {
    $routes->get('sewadars', 'SewadarAPI::index');
    $routes->post('sewadars', 'SewadarAPI::create');
    $routes->get('sewadars/(:num)', 'SewadarAPI::show/$1');
    $routes->put('sewadars/(:num)', 'SewadarAPI::update/$1');
    $routes->delete('sewadars/(:num)', 'SewadarAPI::delete/$1');
});
