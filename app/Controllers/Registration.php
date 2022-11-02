<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Registration extends BaseController{
    
    public function index(){
        $data['title'] = 'Registration';
        return view('register', $data);
    }
}