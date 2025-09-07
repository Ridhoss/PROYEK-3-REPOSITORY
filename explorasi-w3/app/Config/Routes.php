<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/home', 'Dosen::display');
$routes->get('/mahasiswa', 'Mahasiswa::index');
$routes->get('/detail-mahasiswa/(:num)', 'Mahasiswa::detailIndex/$1');
$routes->get('/tambah-mahasiswa', 'Mahasiswa::tambahIndex');

$routes->get('/', 'Auth::loginIndex');
$routes->post('/login', 'Auth::loginAction');

$routes->post('/logout', 'Auth::logout');

$routes->get('/register', 'Auth::registerIndex');
$routes->post('/register', 'Auth::registerAction');

// $routes->get('/mahasiswa/(:num)', 'Dosen::mahasiswa/$1');
