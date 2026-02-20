<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

$routes->group('anggota', function($routes) {
    $routes->get('/', 'Anggota::index');                  
    $routes->get('create', 'Anggota::create');            
    $routes->post('store', 'Anggota::store');             
    $routes->get('edit/(:num)', 'Anggota::edit/$1');      
    $routes->post('update/(:num)', 'Anggota::update/$1'); 
    $routes->delete('delete/(:num)', 'Anggota::delete/$1'); 
});