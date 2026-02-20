<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// Rute untuk CRUD Anggota Klub Badminton
$routes->group('anggota', function($routes) {
    $routes->get('/', 'Anggota::index');                  // Menampilkan halaman daftar anggota
    $routes->get('create', 'Anggota::create');            // Menampilkan form tambah anggota
    $routes->post('store', 'Anggota::store');             // Memproses data inputan baru
    $routes->get('edit/(:num)', 'Anggota::edit/$1');      // Menampilkan form edit berdasarkan ID
    $routes->post('update/(:num)', 'Anggota::update/$1'); // Memproses update data berdasarkan ID
    $routes->delete('delete/(:num)', 'Anggota::delete/$1'); // Memproses hapus data berdasarkan ID
});