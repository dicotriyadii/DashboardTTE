<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');

// Page
$routes->get('/', 'Page::login');
$routes->get('/Dashboard', 'Page::dashboard');
$routes->get('/DataPengguna', 'Page::dataPengguna');
$routes->get('/MasterStatus', 'Page::masterStatus');
$routes->get('/User', 'Page::user');

// Proses
$routes->post('/Login', 'Login_::create');
$routes->post('/TambahDataTTE', 'TTE_::create');
$routes->post('/UpdateStatusTTE', 'TTE_::updateStatus');
$routes->post('/EditDataTTE', 'TTE_::editData');
$routes->post('/PencarianDataTTE', 'TTE_::pencarian');
$routes->get('/HapusDataTTE/(:num)/(:any)', 'TTE_::hapus/$1/$2');
$routes->post('/TambahUser', 'User_::create');
$routes->post('/GantiPassword', 'User_::gantiPassword');
$routes->get('/HapusUser/(:num)/(:any)', 'User_::hapus/$1/$2');
$routes->post('/EditUser', 'User_::editUser');
$routes->post('/TambahStatus', 'Status_::create');
$routes->get('/HapusStatus/(:num)/(:any)', 'Status_::hapus/$1/$2');
$routes->post('/EditStatus', 'Status_::editStatus');
$routes->get('/Keluar', 'Login_::keluar');
