<?php

namespace App\Controllers;
use App\Models\Category_Model;
use App\Models\Sub_Category_Model;
use App\Models\Votes_Model;

class Votes_Controller extends BaseController
{
    public function index()
    {

        $data['title'] = 'Votes';
        return view('panel/user/votes', $data);
    }
    // show public votes on index page
    function showPublicVotes(){
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $publiVotes = new Votes_Model();
        $data['votes'] = $publiVotes->select()
                        ->join('category', 'category.cat_id=sub_category.cat_id')
                        ->where('type','public')
                        ->findAll();

    }
    // show user votes with session id
    function showMyVotes(){
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $votes = new Votes_Model();
        $data['votes'] = $votes->select()
                        ->join('category', 'category.cat_id=sub_category.cat_id')
                        ->where('user_id',session('id'))
                        ->findAll();
    }

    function addVote()
    {
        $security = \Config\Services::security();
        $teamA  = $this->request->getPost('teamA');
        $teamB  = $this->request->getPost('teamB');
        $category  = $this->request->getPost('category');
        $subCategory  = $this->request->getPost('subCategory');
        $teamABanner = $security->sanitizeFilename($this->request->getFile('teamABanner'));
        $teamBBanner = $security->sanitizeFilename($this->request->getFile('teamBBanner'));
        $description  = $this->request->getPost('description');
        $voteType  = $this->request->getPost('voteType');

        if (!$this->validate([
            "teamA" => 'required|trim|xss_clean',
            "teamB" => 'required|trim|xss_clean',
            "category" => 'required|trim|xss_clean',
            "subCategory" => 'required|trim|xss_clean',
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
            "teamBBanner" => 'required|trim|xss_clean',
            "description" => 'required|trim|xss_clean|min_length[5]|max_length[255]',
            "voteType" => 'required|trim|xss_clean',
        ])) {
            $data = [

                "errors" => $this->validator->getErrors()
            ];
           
            return $this->response->setJSON($data);
        }else{
        // $b1 = $security->sanitizeFilename($this->request->getFile('teamABanner'));

        $image = \Config\Services::image();
        $b1 = $this->request->getFile('teamABanner');
            $image->withFile($b1)
                    ->resize(100,100,true,'height')
                    ->save(FCPATH . '/uploads/'.$b1->getRandomName);
                $b1->move(WRITEPATH . 'uploads');

            $b1_name = $b1->getName();

        // $teamBBanner = $security->sanitizeFilename($this->request->getFile('teamBBanner'));
        $b2 = $this->request->getFile('teamBBanner');
            $image->withFile($b2)
                ->resize(100,100,true,'height')
                ->save(FCPATH. '/uploads/'.$b2->getRandomName());
                $b2->move(WRITEPATH . 'uploads');

            $b2_name = $b2->getName();
                       



            $data = [
                'team_a' => $teamA,
                'team_b' => $teamB,
                'team_a_banner' => $b1_name,
                'team_b_banner' => $b2_name,
                'category_id' => $category,
                'subCategory_id' => $subCategory,
                'description' => $description,
                'type' => $voteType,
                'user_id'=>session('id')
            ];

            return $this->response->setJSON(['status' => 'success', 'message' => 'User registered successfully']);
        }
    }

}

