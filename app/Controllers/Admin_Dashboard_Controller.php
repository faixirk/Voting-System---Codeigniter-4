<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Logos_Model;

class Admin_Dashboard_Controller extends BaseController{


    public function index(){
        $data = [];
        $l = new Logos_Model();

        $data['logo'] =$l->first();
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