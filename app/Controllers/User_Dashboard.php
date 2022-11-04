<?php

namespace App\Controllers;

class User_Dashboard extends BaseController
{
    public function index()
    {
         
        $data['title'] = 'Dashboard';
        return view('panel/user/dashboard', $data);
    }
}