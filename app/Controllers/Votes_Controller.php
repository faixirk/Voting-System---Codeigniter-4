<?php

namespace App\Controllers;

class Votes_Controller extends BaseController
{
    public function index()
    {

        $data['title'] = 'Votes';
        return view('panel/user/votes', $data);
    }
    function addVote()
    {
        echo '1';
        $eamA  = $this->request->getPost('teamA');
        $eamB  = $this->request->getPost('teamB');
        $category  = $this->request->getPost('category');
        $subCategory  = $this->request->getPost('subCategory');
        $teamABanner  = $this->request->getPost('teamABanner');
        $teamBBanner  = $this->request->getPost('teamBBanner');
        $description  = $this->request->getPost('description');
        $voteType  = $this->request->getPost('voteType');

        if (!$this->validate([
            "teamA" => 'required',
            "teamB" => 'required',
            "category" => 'required',
            "subCategory" => 'required',
            "teamABanner" => [
                'uploaded[teamABanner]',
                'mime_in[image/png, image/jpg, image/jpeg]',
                'max_size[teamABanner,4096]',
            ],
            "teamBBanner" => [
                'uploaded[teamBBanner]',
                'mime_in[image/png, image/jpg, image/jpeg]',
                'max_size[teamBBanner,4096]',
            ],
            "teamBBanner" => 'required',
            "description" => 'required|min_length[5]|max_length[255]',
            "voteType" => 'required',
        ])) {
            $data = [

                "errors" => $this->validator->getErrors()
            ];
           
            return $this->response->setJSON($data);
        }else{
            return $this->response->setJSON(['status' => 'success', 'message' => 'User registered successfully']);
        }
    }
}
