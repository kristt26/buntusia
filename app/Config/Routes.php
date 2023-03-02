<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('LoginController');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('login', 'LoginController::index');
$routes->post('login/check', 'LoginController::check');
$routes->get('logout', 'LoginController::logout');
$routes->get('home', 'dosen/Home::index',['filter' => 'auth']);
$routes->get('home/read', 'dosen/Home::read',['filter' => 'auth']);

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'admin/Home::index');
    
    $routes->get('proyek', 'admin/Proyek::index');
    $routes->get('proyek/read', 'admin/Proyek::read');
    $routes->post('proyek/post', 'admin/Proyek::post');
    $routes->put('proyek/put', 'admin/Proyek::put');
    $routes->delete('proyek/deleted', 'admin/Proyek::deleted');
    
    $routes->get('pekerjaan', 'admin/Pekerjaan::index');
    $routes->get('pekerjaan/read', 'admin/Pekerjaan::read');
    $routes->post('pekerjaan/post', 'admin/Pekerjaan::post');
    $routes->put('pekerjaan/put', 'admin/Pekerjaan::put');
    $routes->delete('pekerjaan/deleted', 'admin/Pekerjaan::deleted');
    
    $routes->get('detail', 'admin/Detail::index');
    $routes->get('detail/read', 'admin/Detail::read');
    $routes->post('detail/post', 'admin/Detail::post');
    $routes->put('detail/put', 'admin/Detail::put');
    $routes->delete('detail/deleted/(:any)', 'admin\Detail::deleted');
    
    
    
    $routes->get('laporan', 'admin/Laporan::index');
    $routes->get('laporan/read', 'admin/Laporan::read');
    $routes->get('laporan/download', 'admin/Laporan::download');
});

$routes->group('pengawas', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'pengawas/Home::index');
    $routes->get('proyek', 'pengawas/Proyek::index');
    $routes->get('proyek/read', 'pengawas/Proyek::read');
    
    $routes->get('monitoring', 'pengawas/Monitoring::index');
    $routes->get('monitoring/read', 'pengawas/Monitoring::read');
    $routes->put('monitoring/put', 'pengawas/Monitoring::put');
    
});

$routes->group('manajer', ['filter' => 'auth'], function ($routes) {
    $routes->get('pegawai', 'manajer/Pegawai::index');
    $routes->get('pegawai/read', 'manajer/Pegawai::read');
    $routes->post('pegawai/post', 'manajer/Pegawai::post');
    $routes->put('pegawai/put', 'manajer/Pegawai::put');
    $routes->delete('pegawai/deleted', 'manajer/Pegawai::deleted');

    $routes->get('pekerjaan', 'manajer/Pekerjaan::index');
    $routes->get('pekerjaan/read', 'manajer/Pekerjaan::read');
    $routes->post('pekerjaan/post', 'manajer/Pekerjaan::post');
    $routes->put('pekerjaan/put', 'manajer/Pekerjaan::put');
    $routes->delete('pekerjaan/deleted', 'manajer/Pekerjaan::deleted');
    
    $routes->get('detail', 'manajer/Detail::index');
    $routes->get('detail/read', 'manajer/Detail::read');
    $routes->post('detail/post', 'manajer/Detail::post');
    $routes->put('detail/put', 'manajer/Detail::put');
    $routes->delete('detail/deleted', 'manajer/Detail::deleted');
    
    
    
    $routes->get('laporan', 'manajer/Laporan::index');
    $routes->get('laporan/read', 'manajer/Laporan::read');
    $routes->get('laporan/download', 'manajer/Laporan::download');
    
    $routes->get('pengguna', 'manajer/Pengguna::index');
    $routes->get('pengguna/read', 'manajer/Pengguna::read');
    $routes->post('pengguna/post', 'manajer/Pengguna::post');
    $routes->put('pengguna/put', 'manajer/Pengguna::put');
    $routes->delete('pengguna/deleted', 'manajer/Pengguna::deleted');
    
    $routes->get('', 'pengawas/Home::index');
    $routes->get('proyek', 'manajer/Proyek::index');
    $routes->get('proyek/read', 'manajer/Proyek::read');
    
    $routes->get('monitoring', 'pengawas/Monitoring::index');
    $routes->get('monitoring/read', 'pengawas/Monitoring::read');
    $routes->put('monitoring/put', 'pengawas/Monitoring::put');
    
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