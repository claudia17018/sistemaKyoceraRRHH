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
    $routes->get('', 'MiPostulacionController::postulacion', ['as'=> 'postularme'] );
    $routes->post('up', 'MiPostulacionController::upload');
});


$routes->group('Auth',  ['namespace' => 'App\Controllers\Auth'],function ($routes) {
    $routes->get('', 'Usuario::index', ['as'=> 'login'] );
    $routes->post('check', 'Usuario::signin', ['as'=> 'signin']);
    $routes->get('logout', 'Usuario::logout');
    $routes->get('crearCuenta', 'Usuario::crearCuenta');
    $routes->post('guardarAspirante', 'Usuario::store');
});

$routes->group('RRHH',  ['namespace' => 'App\Controllers\RRHH'],function ($routes) {
    $routes->get('', 'Usuario::index', ['as'=> 'index'] );
    $routes->get('entrevistas/(:num)', 'EntrevistaController::entrevistas/$1');
    $routes->get('nuevoComentario/(:num)/(:num)', 'EntrevistaController::nuevoComentario/$1/$2');
    $routes->post('guardarComentario/(:num)/(:num)', 'EntrevistaController::guardarComentario/$1/$2');
    $routes->get('nuevaEntrevista/(:num)', 'EntrevistaController::nuevaEntrevista/$1');
    $routes->post('crearEntrevista/(:num)/(:num)', 'EntrevistaController::crearEntrevista/$1/$2');
    $routes->get('editarEntrevista/(:num)/(:num)', 'EntrevistaController::editarEntrevista/$1/$2');
    $routes->post('guardarEntrevista/(:num)/(:num)/(:num)', 'EntrevistaController::guardarEntrevista/$1/$2/$3');
    $routes->get('eliminarEntrevista/(:num)/(:num)', 'EntrevistaController::eliminarEntrevista/$1/$2');
});

$routes->group('User',  ['namespace' => 'App\Controllers\User'],function ($routes) {
    $routes->get('miPerfil', 'PerfilController::miPerfil');
    $routes->get('editar/(:num)', 'PerfilController::editarPerfil/$1');
    $routes->post('guardar/(:num)', 'PerfilController::guardarPerfil/$1');
    $routes->post('guardarComentario/(:num)/(:num)', 'EntrevistaController::guardarComentario/$1/$2');    
});

$routes->group('Solicitante',  ['namespace' => 'App\Controllers\Solicitante'],function ($routes) {
    $routes->get('', 'Solicitante::index', ['as'=> 'index'] );
    $routes->get('miPerfil/(:num)', 'PerfilController::miPerfil/$1');
    $routes->get('perfil', 'Solicitante::perfil', ['as'=> 'perfil'] );
    $routes->get('editar/(:num)', 'Solicitante::editarPerfil/$1');
    $routes->post('guardar/(:num)', 'Solicitante::guardarPerfil/$1');
    $routes->get('consultar/(:num)', 'Solicitante::singleSolicitante/$1');
    $routes->get('vacante', 'Solicitante::vacanteDisponible');
    $routes->post('estadoPostulante', 'Solicitante::estadoPostulante');
});
$routes->group('AdminRH',  ['namespace' => 'App\Controllers\RRHH'],function ($routes) {
    $routes->get('', 'Admin::index', ['as'=> 'index'] );
    $routes->get('vacantes', 'Admin::vacantes');
    $routes->get('crearVacantes', 'Admin::vacanteCrear');
    $routes->post('guardarVacantes', 'Admin::vacantesGuardar');
    $routes->get('borrarVacantes/(:num)', 'Admin::vacantesBorrar/$1');
    $routes->get('editarVacantes/(:num)', 'Admin::vacantesEditar/$1');
    $routes->get('verVacantes/(:num)', 'Admin::vacanteVer/$1');
    $routes->post('actualizarVacantes', 'Admin::vacantesActualizar');
    $routes->get('postulantesVacantes/(:num)', 'Admin::vacantesPostulantes/$1');
    $routes->get('prueba/(:num)', 'Admin::prueba/$1');
    $routes->get('estadoVacantes/(:num)', 'Admin::vacantesEstado/$1');
    
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
