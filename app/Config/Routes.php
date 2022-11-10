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
//admin
$routes->get('/loginadmin','LoginAdmin::index',['as' => 'loginadmin']);
$routes->get('/admindashboard', 'AdminDashboard::index',['filter' => 'auth'],['as' => 'admindashboard']);
$routes->get('/logout', 'AdminDashboard::logout');
$routes->get('/desa','Desa::index',['filter' => 'auth'],['as' => 'tambahdesa']);
$routes->get('/Akunrt','Akunrt::index',['filter' => 'auth'],['as' => 'akunrt']);
//rt
$routes->get('/loginrt','LoginRt::index',['as' => 'loginrt']);
$routes->get('/rtdashboard', 'RtDashboard::index',['filter' => 'authrt'],['as' => 'rtdashboard']);
$routes->get('/logoutrt', 'RtDashboard::logout');
$routes->get('/konfirmasiwarga', 'KonfirmasiWarga::index',['filter' => 'authrt'],['as' => 'konfirmasiwarga']);
$routes->get('/kategori', 'Kategori::index',['filter' => 'authrt'],['as' => 'kategori']);
$routes->get('/keuangan', 'Keuangan::index',['filter' => 'authrt'],['as' => 'keuangan']);
$routes->get('/warga', 'Warga::index',['filter' => 'authrt'],['as' => 'warga']);
$routes->get('/pengumuman', 'Pengumuman::index',['filter' => 'authrt'],['as' => 'pengumuman']);
$routes->get('/editprofilert', 'Editprofilert::index',['filter' => 'authrt'],['as' => 'editprofilert']);
//warga
$routes->get('/registerwarga','RegisterWarga::index',['as' => 'registerwarga']);
$routes->get('/loginwarga','LoginWarga::index',['as' => 'loginwarga']);
$routes->get('/halamanawal', 'HomeWarga::index',['filter' => 'authwarga'],['as' => 'halamanawal']);
$routes->get('/logoutwarga', 'HomeWarga::logout');
$routes->get('/keuanganwarga', 'KeuanganWarga::index',['filter' => 'authwarga'],['as' => 'keuanganwarga']);
$routes->get('/pengumumanwarga', 'PengumumanWarga::index',['filter' => 'authwarga'],['as' => 'pengumumanwarga']);
$routes->get('/laporwarga', 'LaporWarga::index',['filter' => 'authwarga'],['as' => 'laporwarga']);
$routes->get('/editprofilewarga', 'Editprofilewarga::index',['filter' => 'authwarga'],['as' => 'editprofilewarga']);
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
