<?php

namespace App\Controllers;

use App\Models\Category_Model;
use App\Models\Sub_Category_Model;
use App\Models\Votes_Model;
use App\Models\Votes_Results_Model;
use App\Models\Logos_Model;

class Votes_Controller extends BaseController
{
    public function index()
    {
        if (session('isLoggedIn')) {
            $data['title'] = 'Votes';
            $votes = new Votes_Model();
            $l = new Logos_Model();
            $data['logo'] = $l->first();
            $data['votes'] = $votes->where('user_id', session('user_id'));
            $data['votes'] = $votes->orderBy('vote_id', 'desc')->findAll();
            return view('panel/user/votes', $data);
        } else {
            return redirect()->to('/');
        }
    }
    function updateVoteStatus()
    {
        if (session('isLoggedIn')) {
            $id = $this->request->getPost('id');
            $status = $this->request->getPost('status');
            if (is_numeric($id) && $status != null) {

                $votes = new Votes_Model();
                $vote = $votes->where('vote_id', $id)->first();
                if ($vote['user_id'] == session('user_id')) {

                    if($status == 'result'){
                        $counterA = new Votes_Results_Model();
                        $counterB = new Votes_Results_Model();
                        $countA = $counterA->where('vote_id', $id);
                        $countA = $counterA->where('teama_vote', 1);
                        $countA = $counterA->countAllResults();
        
                        $countB = $counterB->where('vote_id', $id);
                        $countB = $counterB->where('teamb_vote', 1);
                        $countB = $counterB->countAllResults();

                        $query  = $votes->set('teama_votes', $countA);
                        $query  = $votes->set('teamb_votes', $countB);
                        $query  = $votes->set('status', $status)->where('vote_id', $id);
                        $query = $votes->update();
                        if ($query) {
                            $data = [
                                'status' => true,
                                'message' => 'Successfully updated!.'
                            ];
                            echo json_encode($data);
                        } else {
                            $data = [
                                'status' => false,
                                'message' => 'Error occured while updaing!.'
                            ];
                            echo json_encode($data);
                        }
                    }else{
                        $query  = $votes->set('status', $status)->where('vote_id', $id);
                        $query = $votes->update();
                        if ($query) {
                            $data = [
                                'status' => true,
                                'message' => 'Successfully updated!.'
                            ];
                            echo json_encode($data);
                        } else {
                            $data = [
                                'status' => false,
                                'message' => 'Error occured while updaing!.'
                            ];
                            echo json_encode($data);
                        }
                    }

                } else {
                    $data = [
                        'status' => false,
                        'message' => 'Not Found your vote!.'
                    ];
                    echo json_encode($data);
                }
            } else {
                $data = [
                    'status' => false,
                    'message' => 'Error occured while deleting!.'
                ];
                echo json_encode($data);
            }
        } else {
            return redirect()->to('/');
        }
    }
    function deleteVote()
    {
        $id =  $this->request->getPost('id');
        if (is_numeric($id)) {

            $votes = new Votes_Model();
            $vote = $votes->where('vote_id', $id)->first();
            if ($vote['user_id'] == session('user_id')) {
                // delete image
                $path = './public/uploads/votes/';

                if (file_exists($path . $vote['banner1']) || file_exists($path . $vote['banner2'])) {
                    unlink(FCPATH . 'public/uploads/votes/' . $vote['banner1']);
                    unlink(FCPATH . 'public/uploads/votes/' . $vote['banner2']);
                }

                $query = $votes->where('vote_id', $id)->delete();
                if ($query) {
                    $data = [
                        'status' => true,
                        'message' => 'Successfully deleted!.'
                    ];
                    echo json_encode($data);
                } else {
                    $data = [
                        'status' => false,
                        'message' => 'Error occured while deleting!.'
                    ];
                    echo json_encode($data);
                }
            } else {
                $data = [
                    'status' => false,
                    'message' => 'Not Found your vote!.'
                ];
                echo json_encode($data);
            }
        } else {
            $data = [
                'status' => false,
                'message' => 'Error occured while deleting!.'
            ];
            echo json_encode($data);
        }
    }
    // Get description
    function getDescription()
    {
        // if (session('isLoggedIn')) {

        $id = $this->request->getPost('id');
        $votes = new Votes_Model();

        if ($id != null) {

            // $isUnique = $votes->select('vote_id,title,question description');      // check use_id exist in table
            $isUnique = $votes->where('vote_id', $id)->first();
            if ($isUnique) {                                              // If found then send back | already voted
                $data = [
                    'status' => true,
                    'title' => $isUnique['title'],
                    'question' => $isUnique['question'],
                    'description' => $isUnique['description'],

                ];
                echo json_encode($data);
            } else {
                $data = [
                    'status' => false,
                    'message' => "Internal Server error"
                ];
                echo json_encode($data);
            }
        } else {
            $data = [
                'status' => false,
                'message' => "Internal Server error"
            ];
            echo json_encode($data);
        }
        // } else {
        //     $data = [
        //         'status' => false,
        //         'message' => "Please Login First"
        //     ];
        //     echo json_encode($data);
        // }
    }
    // Add vote 
    function addVoteCount()
    {
        if (session('isLoggedIn')) {

            $id = $this->request->getPost('id');
            $type = $this->request->getPost('classType');
            $results = new Votes_Results_Model();
            $counterA = new Votes_Results_Model();
            $counterB = new Votes_Results_Model();
            if ($id != null && $type != null) {

                $countA = $counterA->where('vote_id', $id);
                $countA = $counterA->where('teama_vote', 1);
                $countA = $counterA->countAllResults();

                $countB = $counterB->where('vote_id', $id);
                $countB = $counterB->where('teamb_vote', 1);
                $countB = $counterB->countAllResults();

                $isUnique = $results->select('*');
                $isUnique = $results->where('user_id', session('user_id'));       // check use_id exist in table
                $isUnique = $results->where('vote_id', $id)->first();
                if ($isUnique) {                                              // If found then send back | already voted
                    $data = [
                        'status' => false,
                        'message' => 'Already Voted.',
                        'teamA' => $countA,
                        'teamB' => $countB,

                    ];
                    echo json_encode($data);
                } else {


                    $addVote = [
                        'vote_id' => $id,
                        'user_id' => session('user_id'),
                        'teama_vote' => ($type == 'teamA') ? "1" : '0',
                        'teamb_vote' => ($type == 'teamB') ? '1' : '0',
                    ];

                    $query = $results->save($addVote);
                    if ($query) {
                        $data = [
                            'status' => true,
                            'message' => "Voted",
                            'teamA' => ($type == 'teamA') ? $countA + 1 : $countA,
                            'teamB' => ($type == 'teamB') ? $countB + 1 : $countB,
                        ];
                        echo json_encode($data);
                    } else {
                        $data = [
                            'status' => false,
                            'message' => "Internal Server error"
                        ];
                        echo json_encode($data);
                    }
                }
            } else {
                $data = [
                    'status' => false,
                    'message' => "Internal Server error"
                ];
                echo json_encode($data);
            }
        } else {
            $data = [
                'status' => false,
                'message' => "Please Login First"
            ];
            echo json_encode($data);
        }
    }


    // show public votes on index page
    function showPublicVotes()
    {
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $publiVotes = new Votes_Model();
        $data['category'] = $cat->select()
            ->join('votes', 'votes.category_id=category.cat_id')->join('sub_category', 'sub_category.cat_id=votes.cat_id')->findAll();
        $data['category'] = $cat->where('type', 'public');
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

        $validation = [
            "title" => 'required|trim|max_length[255]',
            "question" => 'required|trim|max_length[255]',
            "teamA" => 'required|trim',
            "teamB" => 'required|trim',
            "category" => 'required|trim',
            "subCategory" => 'trim',
            "description" => 'required|trim|min_length[15]|max_length[150]', 
            'banner1' => [
                'rules' => 'uploaded[banner1]'
                    . '|is_image[banner1]'
                    . '|mime_in[banner1,image/jpg,image/jpeg,image/gif,image/png]'
                    . '|max_size[banner1,100]'
                    . '|max_dims[banner1,768,768]'
            ],
            'banner2' => [
                'rules' => [
                    'uploaded[banner2]',
                    // 'mime_in[banner2,image/jpg,image/jpeg,image/png]',
                ]
            ],
        ];
        if ($this->validate($validation) == FALSE) {
            if ($this->validator->hasError('title')) {
                $data = [
                    'status' => false,
                    'message' => $this->validator->getError('title'),
                ];
                echo json_encode($data);
            }
            else if ($this->validator->hasError('question')) {
                $data = [
                    'status' => false,
                    'message' => $this->validator->getError('question'),
                ];
                echo json_encode($data);
            }
            else if ($this->validator->hasError('teamA')) {
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
                echo json_encode($data); } else if ($this->validator->hasError('banner1')) {
                $data =  [
                    'status' => false,
                    'message' => $this->validator->getError('banner1')
                ];
                echo json_encode($data);
            } else if ($this->validator->hasError('banner2')) {
                $data =  [
                    'status' => false,
                    'message' => $this->validator->getError('banner2')
                ];
                echo json_encode($data);
            }
        } else {

            $votes = new Votes_Model();

            $title  = $this->request->getPost('title');
            $question  = $this->request->getPost('question');
            $teamA  = $this->request->getPost('teamA');
            $teamB  = $this->request->getPost('teamB');
            $category  = $this->request->getPost('category');
            $subCategory  = $this->request->getPost('subCategory');
            $description  = $this->request->getPost('description');
            $voteType  = "public";
            $file1 = $this->request->getFile('banner1');
            $file2 = $this->request->getFile('banner2');
            if ($file1 && $file2) {

                if ($file1->isValid() && !$file1->hasMoved() && $file2->isValid() && !$file2->hasMoved()) {
                    $path = './public/uploads/votes/';
                    $newName1 = $file1->getRandomName();
                    $newName2 = $file2->getRandomName();
                    $file1->move($path, $newName1);
                    $file2->move($path, $newName2);
                } else {
                    //file not valid and has moved
                    $data = [
                        'status' => false,
                        'message' => 'Error occured while creating vote.'
                    ];
                    echo json_encode($data);
                }
            } else {
                //file not get
                $data = [
                    'status' => false,
                    'message' => 'Error occured while creating vote.'
                ];
                echo json_encode($data);
            }


            $data = [
                'title' => $title,
                'question' => $question,
                'team_a' => $teamA,
                'team_b' => $teamB,
                'category_id' => $category,
                'description' => $description,
                'subCategory_id' => $subCategory,
                'banner1' => $newName1,
                'banner2' => $newName2,
                'description' => $description,
                'type' => $voteType,
                'user_id' => session('user_id')
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
