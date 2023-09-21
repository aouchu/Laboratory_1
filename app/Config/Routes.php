<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/product', 'ProductController::index');
$routes->get('/product/(:any)', 'ProductController::product/$1');
$routes->post('/save', 'ProductController::save_p');
$routes->get('/delete/(:any)', 'ProductController::delete_p/$1');
$routes->get('/edit/(:any)', 'ProductController::edit_p/$1');
$routes->post('/save_c', 'ProductController::save_c');
$routes->get('/delete_c/(:any)', 'ProductController::delete_c/$1');
$routes->get('/edit_c/(:any)', 'ProductController::edit_c/$1');
