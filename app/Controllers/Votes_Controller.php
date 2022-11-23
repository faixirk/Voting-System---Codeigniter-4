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
        $cat = new Category_Model();
        $votes = new Votes_Model();

        // $data['myvotes'] = $votes->select()
            // ->join('votes', 'votes.category_id=category.cat_id')->join('sub_category', 'sub_category.cat_id=votes.category_id')->findAll();
        // $data['myvotes'] = $cat->where('user_id', 2); 
        return view('panel/user/votes', $data);
    }
    // show public votes on index page
    function showPublicVotes()
    {
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $publiVotes = new Votes_Model();
        $data['category'] = $cat->select()
            ->join('votes', 'votes.category_id=category.cat_id')->join('sub_category', 'sub_category.cat_id=votes.cat_id')->findAll();
            $data['category'] = $cat->where('type','public');
            
    }
    // show user votes with session id
    function showMyVotes()
    {
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $votes = new Votes_Model();
        $data['votes'] = $votes->select()
            ->join('category', 'category.cat_id=sub_category.cat_id')
            ->where('user_id', session('id'))
            ->findAll();
    }

    function addVote()
    {
        $security = \Config\Services::security();
        $validation = [
            "teamA" => 'required|trim',
            "teamB" => 'required|trim',
            "category" => 'required|trim',
            "subCategory" => 'trim',
            "description" => 'required|trim|min_length[15]|max_length[150]',
            "voteType" => 'required|trim',
        ];
        if ($this->validate($validation) == FALSE) {
            if ($this->validator->hasError('teamA')) {
                $data = [
                    'status' => false,
                    'message' => $this->validator->getError('teamA'),
                ];
                echo json_encode($data);
            }
            if ($this->validator->hasError('teamB')) {
                $data = [
                    'status' => false,
                    'message' => $this->validator->getError('teamB'),
                ];
                echo json_encode($data);
            } else if ($this->validator->hasError('category')) {
                $data = [
                    'status' => false,
                    'message' => $this->validator->getError('category'),
                ];
                echo json_encode($data);
            } else if ($this->validator->hasError('voteType')) {
                $data = [
                    'status' => false,
                    'message' => $this->validator->getError('voteType'),
                ];
                echo json_encode($data);
            }
        } else {

            $votes = new Votes_Model();

            $teamA  = $this->request->getPost('teamA');
            $teamB  = $this->request->getPost('teamB');
            $category  = $this->request->getPost('category');
            $subCategory  = $this->request->getPost('subCategory');
            $description  = $this->request->getPost('description');
            $voteType  = $this->request->getPost('voteType');
            $data = [
                'team_a' => $teamA,
                'team_b' => $teamB,
                'category_id' => $category,
                'subCategory_id' => $subCategory,
                'description' => $description,
                'type' => $voteType,
                'user_id' => 2
                // 'user_id' => session('id')
            ];
            $query = $votes->save($data);
            if ($query) {
                $data = [
                    'status' => true,
                    'message' => 'Successfully created.'
                ];
                echo json_encode($data);
            } else {
                $data = [
                    'status' => false,
                    'message' => 'Error occured while creating vote.'
                ];
                echo json_encode($data);
            }
            exit(0);
        }
    }
}
