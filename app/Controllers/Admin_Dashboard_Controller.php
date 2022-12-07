<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Logos_Model;
use App\Models\Votes_Model;

class Admin_Dashboard_Controller extends BaseController{


    public function index(){
        if(session('isLoggedIn')==true){
        $data = [];
        $l = new Logos_Model();
        $votes = new Votes_Model();
        $data['logo'] =$l->first();
    $data['title'] = 'Dashboard';
    $data['votes'] = $votes->findAll();
    return view('admin/dashboard', $data);
    }
    else{
        return redirect()->to('admin');
    }
}
}
