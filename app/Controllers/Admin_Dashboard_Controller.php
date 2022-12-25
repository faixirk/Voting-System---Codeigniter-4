<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Logos_Model;
use App\Models\Votes_Model;

class Admin_Dashboard_Controller extends BaseController
{


    public function index()
    {
        if (session('isLoggedIn') == true && session('type') == 'admin')  {
            $data = [];
            $l = new Logos_Model();
            $votes = new Votes_Model();
            $data['logo'] = $l->first();
            $data['title'] = 'Dashboard';
            $data['votes'] = $votes->select()->join('votes_results','votes_results.vote_id=votes.vote_id','left')->findAll();
            return view('admin/dashboard', $data);
        } else {
            return redirect()->to('/');
        }
    }
}
