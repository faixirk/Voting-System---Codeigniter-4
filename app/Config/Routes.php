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
$routes->get('/(:num)', 'Home::getCategory/$1');
$routes->get('/rooms/(:num)', 'Home::getRooms/$1');
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
$routes->get('user/reset/password', 'Login_Controller::index_forgot_password');
$routes->post('user/forgot/password', 'Login_Controller::forgot_password');
$routes->get('login/reset_password/(:any)', 'Login_Controller::reset_passwordView/$1');
$routes->match(['get','post'],'login/reset_password/(:any)', 'Login_Controller::reset_password/$1');
$routes->get('registration/activate/(:alphanum)', 'Registration_Controller::activate/$1');




//Dashboard
$routes->match(['get', 'post'], 'user/dashboard', 'User_Dashboard::index');

//  ----------------- All User Routes ------------------
//Notification
$routes->get('getNotification', 'User_Dashboard::get_notification');
// Chats
// $routes->group('user',['filter'=>'AuthCheck'],function($routes){
$routes->group('user', function ($routes) {
    // Profile
    $routes->get('profile', 'User_Profile_Controller::index');
    $routes->get('logo', 'User_Profile_Controller::loadLogo');
    $routes->post('profile/update', 'User_Profile_Controller::profileUpdate');
    $routes->post('password/update', 'User_Profile_Controller::passwordUpdate');
    $routes->post('photo/update', 'User_Profile_Controller::profileimageUpdate');
    // Chats
    $routes->get('chats', 'Chats_Controller::index');

    // Groups
    $routes->get('groups', 'Groups_Controller::index');
    $routes->get('votes', 'Votes_Controller::index');
    $routes->get('groups', 'Groups_Controller::index');
    $routes->post('addgroup', 'Groups_Controller::add_group');
    $routes->match(['get', 'post'], 'chat', 'Chats_Controller::public_chat');
    $routes->match(['get', 'post'], 'chat/(:num)', 'Chats_Controller::chat/$1');
    $routes->get('getmsg', 'Chats_Controller::public_msg');
    $routes->get('getmsg/(:num)', 'Chats_Controller::msg/$1');
    $routes->get('groups/requests', 'Groups_Controller::requests_index');
    $routes->get('groups/requests/(:num)', 'Groups_Controller::requests/$1');
    $routes->get('groups/requests/accept/(:num)/(:any)', 'Groups_Controller::setRequest/$1/$2');
    $routes->get('groups/requests/delete/(:num)', 'Groups_Controller::deleteRequest/$1');
    $routes->get('groups/private', 'Groups_Controller::rooms');
    $routes->get('groups/private/single/(:num)', 'Groups_Controller::single_room/$1');

    // Votes
    $routes->post('addvote', 'Votes_Controller::addVote');
    $routes->post('private/addvote/(:num)', 'Groups_Controller::addVote/$1');
    $routes->post('countvote', 'Votes_Controller::addVoteCount');
    $routes->post('updatestatus', 'Votes_Controller::updateVoteStatus');
    $routes->post('getDesc', 'Votes_Controller::getDescription');
    $routes->get('getcategory', 'Admin_Category_Controller::getCategories');
    $routes->post('deletevote', 'Votes_Controller::deleteVote');
    $routes->get('getcategory/(:num)', 'Admin_Sub_Category_Controller::getSubCategory/$1');
});





$routes->get('/about-us', 'Home::about_us');
$routes->get('/faq', 'Home::faq');
$routes->get('/blog', 'Home::blog');
$routes->get('/contact', 'Home::contact');
$routes->get('/results', 'Home::results');

//  ------- X ------ All User Routes --------- X -------

//  -------------- All Admin Routes ---------=-------

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
$routes->match(['get', 'post'], 'admin/user/delete/(:num)', 'Admin_User_Controller::deleteUser/$1');


//Admin  Category Controller
$routes->group('admin', function ($routes) {
    $routes->get('category', 'Admin_Category_Controller::index');
    $routes->post('add/category', 'Admin_Category_Controller::addCategory');
    $routes->post('edit/category/(:num)', 'Admin_Category_Controller::editCategory/$1');
    $routes->get('delete/category/(:num)', 'Admin_Category_Controller::deleteCategory/$1');
});

//Admin Sub Category Controller
$routes->group('admin', function ($routes) {
    $routes->get('sub-category', 'Admin_Sub_Category_Controller::index');
    $routes->post('add/sub-category', 'Admin_Sub_Category_Controller::addSubCategory');
    $routes->post('edit/sub-category/(:num)', 'Admin_Sub_Category_Controller::editSubCategory/$1');
    $routes->get('delete/sub-category/(:num)', 'Admin_Sub_Category_Controller::deleteSubCategory/$1');
});

//Admin Logo Settings
$routes->group('admin', function ($routes) {
    $routes->get('logo-settings', 'Website_Settings_Controller::index');
    $routes->post('logo/update', 'Website_Settings_Controller::logo_update');
});

//Admin Breadcumb Settings
$routes->group('admin', function ($routes) {
    $routes->get('breadcrumb', 'Website_Settings_Controller::index_breadcrumb');
    $routes->post('breadcrumb/update', 'Website_Settings_Controller::breadcrumb_update');
});

//Admin Miscellenious
$routes->group('admin', function ($routes) {
    $routes->get('about_us', 'Website_Settings_Controller::index_aboutUs');
    $routes->post('about_us/add', 'Website_Settings_Controller::add_aboutUs');
    $routes->get('contact', 'Website_Settings_Controller::index_contact');
    $routes->post('contact_us/add', 'Website_Settings_Controller::add_contactUs');
    $routes->get('social', 'Website_Settings_Controller::index_social');
    $routes->get('social/addView', 'Website_Settings_Controller::index_links');
    $routes->post('social/addLinks', 'Website_Settings_Controller::linksUpdate');
    $routes->get('social/links/edit/(:num)', 'Website_Settings_Controller::linksEditView/$1');
    $routes->post('social/editLinks/(:num)', 'Website_Settings_Controller::linksEdit/$1');
    $routes->get('link/delete/(:num)', 'Website_Settings_Controller::linkDelete/$1');
    $routes->get('slider', 'Website_Settings_Controller::index_slider');
});


//Admin Logout
$routes->match(['get', 'post'], 'admin/logout', 'Admin_Login_Controller::logout');

if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
//  ------- X ------ All Admin Routes --------- X -------
