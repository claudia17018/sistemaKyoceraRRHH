<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->add('/plantilla', 'Home::plantilla');


$routes->group('postular',  ['namespace' => 'App\Controllers\postulacionCandidato'],function ($routes) {
    $routes->get('p', 'MiPostulacionController::p');
    $routes->post('up', 'MiPostulacionController::upload');
});


$routes->group('Auth',  ['namespace' => 'App\Controllers\Auth'],function ($routes) {
    $routes->get('', 'Usuario::index', ['as'=> 'login'] );
    $routes->post('check', 'Usuario::signin', ['as'=> 'signin']);
    $routes->get('logout', 'Usuario::logout');
    $routes->get('crearCuenta', 'Usuario::crearCuenta');
    $routes->post('guardarAspirante', 'Usuario::store');
});

$routes->group('AdminRH',  ['namespace' => 'App\Controllers\RRHH'],function ($routes) {
    $routes->get('', 'Usuario::index', ['as'=> 'index'] );
    $routes->get('entrevistas', 'EntrevistaController::entrevistas');
    $routes->get('nuevoComentario/(:num)', 'EntrevistaController::nuevoComentario/$1');
    $routes->post('guardarComentario/(:num)', 'EntrevistaController::guardarComentario/$1');
    
});


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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
