<?php
use CodeIgniter\Router\RouteCollection;
$routes->get('/', 'Home::index');
$routes->post('add', 'Home::add');
$routes->post('index.php/add', 'Home::add');
$routes->get('delete/(:num)', 'Home::delete/$1');
$routes->get('index.php/delete/(:num)', 'Home::delete/$1');
