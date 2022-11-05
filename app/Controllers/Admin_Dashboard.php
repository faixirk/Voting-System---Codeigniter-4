<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Admin_Dashboard extends BaseController{


    public function index(){

    $data['title'] = 'Dashboard';
    return view('admin/dashboard', $data);
    
}
}