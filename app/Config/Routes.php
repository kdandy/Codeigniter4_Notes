<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->get('/register', 'Register::index', ['as' => 'register']);
$routes->post('/login/process', 'Login::process');
$routes->post('/register/process', 'Register::process');
$routes->get('/logout', 'Login::logout');

$routes->get('/notes', 'Notes::index', ['filter' => 'auth']);
$routes->get('/notes/create', 'Notes::create', ['filter' => 'auth']);
$routes->post('/notes/save', 'Notes::save', ['filter' => 'auth']);
$routes->get('/notes/edit/(:num)', 'Notes::edit/$1', ['filter' => 'auth']);
$routes->post('/notes/update/(:num)', 'Notes::update/$1', ['filter' => 'auth']);
$routes->delete('/notes/(:num)', 'Notes::delete/$1', ['filter' => 'auth']);
$routes->get('/notes/(:any)', 'Notes::detail/$1', ['filter' => 'auth']);
$routes->get('/profile', 'Profile::index', ['filter' => 'auth']);

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
