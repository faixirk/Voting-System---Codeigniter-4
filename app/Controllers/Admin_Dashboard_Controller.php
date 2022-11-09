<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Admin_Dashboard_Controller extends BaseController{


    public function index(){
        $data = [];
    if(session('isLoggedIn')==true){
    $data['title'] = 'Dashboard';
    return view('admin/dashboard', $data);
    }
    else{
        return redirect()->to('admin');
    }
}
}
?>