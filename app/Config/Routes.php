<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Users::index');

$routes->get('/about', 'Home::about');

// Customer Routes
$routes->get('/customers', 'Customers::index');
$routes->get('/customers/new', 'Customers::create');
$routes->post('/customers/store', 'Customers::store');
$routes->get('/customers/edit/(:num)', 'Customers::edit/$1');
$routes->post('/customers/update/(:num)', 'Customers::update/$1');

// User Routes
$routes->get('users', 'Users::index');
$routes->get('users/create', 'Users::create'); 
$routes->post('users/store', 'Users::store');
$routes->get('users/edit/(:num)', 'Users::edit/$1');
$routes->post('users/update/(:num)', 'Users::update/$1');