<?php

namespace App\Controllers;

class Votes_Controller extends BaseController
{
    public function index()
    {
         
        $data['title'] = 'Votes';
        return view('panel/user/votes', $data);
    }
}