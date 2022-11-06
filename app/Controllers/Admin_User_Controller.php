<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_Model;

class Admin_User_Controller extends BaseController{
    
    public function index(){
        $data = [];
        $data['title'] = 'All Users';
        $user = new User_Model();
        $data['users'] = $user->findAll();        
        return view('admin/users', $data);
    }
}