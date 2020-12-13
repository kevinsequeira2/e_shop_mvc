<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'UserController::index');
$routes->get('/users/login', 'UserController::firstView');
$routes->get('/users/valid', 'UserController::validLogin');
$routes->get('/users/singnup', 'UserController::register');
$routes->get('/users/addedusers', 'UserController::addUser');
$routes->get('/admin/Viewcategory', 'AdminController::category');
$routes->get('/edit/category', 'CategoryController::editCategory');
$routes->get('/delete/category', 'CategoryController::deleteCategory');
$routes->get('/add/category', 'CategoryController::addCategory');
$routes->get('/insert/category', 'CategoryController::insertCategory');
$routes->get('/admin', 'CategoryController::back');
$routes->get('/admin/Viewproducts', 'AdminController::products');
$routes->get('/edit/products', 'ProductsController::editProducts');
$routes->get('/edit/_products', 'ProductsController::edit_Products');
$routes->get('/delete/products', 'ProductsController::deleteProducts');
$routes->get('/insert/products', 'ProductsController::saveProducts');
$routes->get('/view/categories', 'ClientController::viewclientCategories');
$routes->get('/get/products', 'ClientController::viewclientProducts');
$routes->get('/ViewClient', 'ClientController::backClient');
$routes->get('/buy/car', 'ClientController::buyCar');


/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
