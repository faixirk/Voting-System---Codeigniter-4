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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('/server', 'Server::index');




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


// Login
$routes->group('', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->match(['get', 'post'], 'login', 'Login_Controller::index');
    $routes->post('login/auth', 'Login_Controller::loginVerification');
});
// Logout
$routes->get('user/logout', 'Login_Controller::logout');
// Registration
$routes->group('', function ($routes) {
    $routes->get('register', 'Registration_Controller::index');
    $routes->match(['get', 'post'], 'register/add', 'Registration_Controller::registrationUser');
});

//Profile
$routes->group('user', function ($routes) {
    $routes->get('profile', 'User_Profile_Controller::index');
    $routes->get('logo', 'User_Profile_Controller::loadLogo');
    $routes->post('profile/update', 'User_Profile_Controller::profileUpdate');
    $routes->post('password/update', 'User_Profile_Controller::passwordUpdate');
    $routes->post('photo/update', 'User_Profile_Controller::profileimageUpdate');
});

//Dashboard
$routes->match(['get', 'post'], 'user/dashboard', 'User_Dashboard::index');

//  ----------------- All User Routes ------------------
// Chats
// $routes->group('user',['filter'=>'AuthCheck'],function($routes){
$routes->group('user', function ($routes) {
    $routes->get('chats', 'Chats_Controller::index');
    $routes->get('groups', 'Groups_Controller::index');
    $routes->match(['get', 'post'], 'chat', 'Chats_Controller::chat');
    $routes->get('getmsg', 'Chats_Controller::msg');
    $routes->get('groups/requests', 'Groups_Controller::requests_index');
    $routes->get('groups/requests/(:num)', 'Groups_Controller::requests/$1');
});

// votes
$routes->group('user', function ($routes) {
    $routes->get('votes', 'Votes_Controller::index');
    $routes->get('groups', 'Groups_Controller::index');
    $routes->post('addgroup', 'Groups_Controller::add_group');
});

// votes
$routes->group('user', function ($routes) {
    $routes->post('addvote', 'Votes_Controller::addVote');
    $routes->get('getcategory', 'Admin_Category_Controller::getCategories');
    $routes->get('getcategory/(:num)', 'Admin_Sub_Category_Controller::getSubCategory/$1');
});

//  ------- X ------ All User Routes --------- X -------



$routes->get('/about-us', 'Home::about_us');
$routes->get('/faq', 'Home::faq');
$routes->get('/blog', 'Home::blog');
$routes->get('/contact', 'Home::contact');

//  $routes->get('user/register', 'Registration::index');
$routes->get('user/login', 'User_Login::index');
$routes->get('user/reset/password', 'User_Login::reset_password');

//Admin Login
$routes->group('admin', ['filter' => 'AlreadyLoggedIn'], function ($routes) {
    $routes->get('', 'Admin_Login_Controller::index');
    $routes->post('login', 'Admin_Login_Controller::loginVerify');
});

//Admin Dashboard 
$routes->match(['get', 'post'], 'admin/dashboard', 'Admin_Dashboard_Controller::index');

//Admin Profile
$routes->group('admin', function ($routes) {
    $routes->get('profile', 'Admin_Profile_Controller::index');
    $routes->post('profile/update', 'Admin_Profile_Controller::profileUpdate');
    $routes->post('profile/photo/update', 'Admin_Profile_Controller::updatePic');
    $routes->get('password', 'Admin_Password_Controller::index');
    $routes->match(['get', 'post'], 'password/update', 'Admin_Password_Controller::updatePassword');
});
//Admin User Controller
$routes->match(['get', 'post'], 'admin/users', 'Admin_User_Controller::index');


//Admin  Category Controller
$routes->group('admin', function ($routes) {
    $routes->get('category', 'Admin_Category_Controller::index');
    $routes->post('add/category', 'Admin_Category_Controller::addCategory');
    $routes->post('delete/category/(:num)', 'Admin_Category_Controller::deleteCategory/$1');
});

//Admin Sub Category Controller
$routes->group('admin', function ($routes) {
    $routes->get('sub-category', 'Admin_Sub_Category_Controller::index');
    $routes->post('add/sub-category', 'Admin_Sub_Category_Controller::addSubCategory');
    $routes->post('delete/sub-category/(:num)', 'Admin_Category_Controller::deleteSubCategory/$1');
});

//Admin Logout
$routes->match(['get', 'post'], 'admin/logout', 'Admin_Login_Controller::logout');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
