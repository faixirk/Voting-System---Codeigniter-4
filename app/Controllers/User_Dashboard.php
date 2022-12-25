<?php

namespace App\Controllers;

use App\Models\Votes_Model;
use App\Models\Logos_Model;
use App\Models\Requests_Model;
use CodeIgniter\API\ResponseTrait;


class User_Dashboard extends BaseController
{
    use ResponseTrait;
    public function index()
    {

        $data['title'] = 'Dashboard';
        if(!session('isLoggedIn')){
            return redirect()->to('/');
        }
        else{
        $l = new Logos_Model();
        $data['logo'] = $l->first();

        
        // total votes
        $totalVotes = new Votes_Model();
        $data['totalVotes'] = $totalVotes->where('user_id', session('user_id'));
        $data['totalVotes'] = $totalVotes->countAllResults();

        // active votes
        $activeVotes = new Votes_Model();
        $data['activeVotes'] = $activeVotes->where('user_id', session('user_id'));
        $data['activeVotes'] = $activeVotes->where('status', 'active');
        $data['activeVotes'] = $activeVotes->countAllResults();

        // result votse
        $resultVotes = new Votes_Model();
        $data['resultVotes'] = $resultVotes->where('user_id', session('user_id'));
        $data['resultVotes'] = $resultVotes->where('status', 'result');
        $data['resultVotes'] = $resultVotes->countAllResults();

        // close votes
        $closeVotes = new Votes_Model();
        $data['closeVotes'] = $closeVotes->where('user_id', session('user_id'));
        $data['closeVotes'] = $closeVotes->where('status', 'closed');
        $data['closeVotes'] = $closeVotes->countAllResults();


        return view('panel/user/dashboard', $data);
        }

    }
    public function get_notification()
    {

        $requests = new Requests_Model();
        $data['requests'] = $requests->select()->where('creator_id', session('user_id'))->findAll();
        // echo '<pre>';
        // print_r($data);
        // die();
        return $this->respond($data);
    }
}
