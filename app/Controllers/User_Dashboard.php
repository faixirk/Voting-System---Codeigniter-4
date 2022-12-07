<?php

namespace App\Controllers;
use App\Models\Votes_Model;

class User_Dashboard extends BaseController
{
    public function index()
    {
         
        $data['title'] = 'Dashboard'; 

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