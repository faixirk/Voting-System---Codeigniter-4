<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Groups_Model;
use App\Models\User_Model;
use App\Models\Requests_Model;
use App\Models\Votes_Model;
use App\Models\Logos_Model;
use App\Models\Private_Members_Model;
use CodeIgniter\Exceptions\AlertError;

class Groups_Controller extends BaseController
{
    public function index()
    {
        if (!session('isLoggedIn')) {
            return redirect()->to('/');
        } else {
            $data['title'] = "User | Groups";
            $user = new User_Model();
            $l = new Logos_Model();
            $data['logo'] = $l->first();
            $data['user'] = $user->select('*');
            $data['user'] = $user->where('user_id', session('user_id'))->first();

            return view('panel/user/groups', $data);
        }
    }
    public function add_group()
    {
        $data = [];
        $rules = [
            'group' => [
                'rules' => 'required|min_length[3]|max_length[100]',
            ],

            'category' => [
                'rules' => 'required'
            ],

            'subCategory' => [
                'rules' => 'required'
            ]

        ];
        if ($this->validate($rules)) {
            $name = $this->request->getPost('group');
            $cat = $this->request->getPost('category');
            $sub_cat = $this->request->getPost('subCategory');

            $data = [
                'group_name' => $name,
                'cat_id' => $cat,
                'sub_cat_id' => $sub_cat,
                'user_id' => session('user_id')
            ];

            $group = new Groups_Model();
            $request = new Requests_Model();
            $query = $group->insert($data);
            if ($query) {
                $group_id = $group->where('user_id', session('user_id'))->orderBy('group_id', 'DESC')->first();

                $data2 = [
                    'group_id' => $group_id['group_id'],
                    'creator_id' => session('user_id'),
                    'user_id' => session('user_id'),
                    'status' => '1',
                    'has_joined' => 'true'
                ];
                $query2 = $request->insert($data2);
                if ($query2) {
                    //data inserted 
                    echo 1;
                } else {
                    //data not inserted
                    echo 2;
                }
            }
        } else {
            //data not validated
            echo 3;
        }
    }
    public function requests_index()
    {
        if (!session('isLoggedIn')) {
            return redirect()->to('/');
        } else {
            $data['title'] = 'Requests | User';
            $l = new Logos_Model();
            $data['logo'] = $l->first();
            $requests = new Requests_Model();
            //--------- join requests->groups && requests->users ----------------------------------------------
            $data['requests'] = $requests->select()->join('groups', 'groups.group_id=requests.group_id')->join('user', 'user.user_id=requests.user_id');
            //-------------------- END 'JOIN' -----------------------------------------------------------------

            //------------------- find all data where creator id matches session id of user --------------------
            $data['requests'] = $requests->where('creator_id', session('user_id'))->findAll();
            //----------------------- END 'WHERE' --------------------------------------------------------------

            return view('panel/user/requests', $data);
        }
    }
    public function requests($id)
    {
        $data = [];
        $group = new Groups_Model();
        $user = new User_Model();
        $requests = new Requests_Model();
        $userID = session('user_id');
        $checkGroup = $group->where('group_id', $id)->first();  //matches the group id from user passed to groups table
        $checkUser = $requests->select('*');
        $checkUser = $requests->where('group_id', $id);
        $checkUser = $requests->where('user_id', $userID)->first();
        $checkCreator = $user->select();
        $checkCreator = $user->where('user_id', $checkGroup['user_id'])->first();

        if (session('isLoggedIn') == true) {  //true if user is logged in
            $data = [
                'user_id' => session('user_id'),   //user who is logged in
                'group_id' => $id,
                'creator_id' => $checkGroup['user_id'],  //user who created the group
                'status' => '1'   //request sent => 1 otherwise 0
            ];
            if (!$checkUser) { //if request is not already sent then true
                $query = $requests->insert($data);
                if ($query) {
                    $email = \Config\Services::email();

                    $to = $checkCreator['user_email'];
                    $subject = 'A User has Requested to Join the Group';
                    $message = 'Hey ' . $checkCreator['first_name'] . ",<br><br>You have recieved a request from a user to join your group: " . $checkGroup['group_name'] . ". Please visit your requests section to see the request<br><br>
                Regards,<br>Team Daily Voting";

                    $email->setTo($to);
                    $email->setFrom('system@dailyvoting.com', 'Request to Join The Group');

                    $email->setSubject($subject);
                    $email->setMessage($message);
                    if ($email->send()) {
                        //query successful and email sent
                        echo 0;
                    } else {
                        //email not sent
                        echo 4;
                    }
                } else {
                    // query failed to update
                    echo 1;
                }
            } else {
                if ($checkUser['has_joined'] == 'true') {
                    echo 2;
                } else {
                    //request already sent and not accepted
                    echo 5;
                }
            }
        } else {
            //true if user is not logged in
            echo 3;
        }
    }
    public function setRequest($id, $userID)
    {
        $requests = new Requests_Model();
        $user = new User_Model();
        $group = new Groups_Model();
        $private = new Private_Members_Model();
        $check = $requests->where('group_id', $id);
        $check = $requests->where('user_id', $userID)->first();
        $users = $user->select()->where('user_id', $userID)->first();
        $group_desc = $group->where('group_id', $id)->first();

        if ($check) {
            $requests->set('has_joined', 'true');
            //condition to check if the user id and group id matches, then set has_joined to true
            $requests->where('group_id', $id);
            $requests->where('user_id', $userID);
            $query = $requests->update();
            $data = [
                'first_name' => $users['first_name'],
                'last_name' => $users['last_name'],
                'user_email' => $users['user_email'],
                'pic' => $users['pic'],
                'created_at' => $users['created_at'],
                'updated_at' => $users['updated_at'],
                'creator_id' => $check['creator_id'],
                'group_id' => $id,
                'user_id' => $userID,
            ];
            //insert data into private members table
            $query2 = $private->insert($data);
            $email = \Config\Services::email();

            $to = $users['user_email'];
            $subject = 'Congratulations 🎉. Your Request has been Accepted';
            $message = 'Hey ' . $users['first_name'] . ",<br><br>Your request to join the group: " . $group_desc['group_name'] . " has been accepted. Please visit your Private Rooms Section to visit the group<br><br>
                Regards,<br>Team Daily Voting";

            $email->setTo($to);
            $email->setFrom('system@dailyvoting.com', 'Request to Join The Group');

            $email->setSubject($subject);
            $email->setMessage($message);
            $email->send();
            if ($query && $query2) {
                //has joined set to 1
                echo 1;
            } else {
                //query failed
                echo 2;
            }
        } else {
            echo 2;
        }
    }
    public function deleteRequest($id)
    {
        $request = new Requests_Model();
        $query = $request->delete($id);
        if ($query) {
            //record deleted successfully
            echo 1;
        } else {
            //query failed
            echo 2;
        }
    }
    public function rooms()
    {
        $data = [];
        $data['title'] = 'Private | User';
        $l = new Logos_Model();
        $data['logo'] = $l->first();
        $requests = new Requests_Model();
        $groups = new Groups_Model();
        $data['private'] = $groups->select()->join('requests', 'requests.group_id=groups.group_id')->findAll();


        return view('panel/user/rooms', $data);
    }
    public function single_room($id)
    {
        if (!session('isLoggedIn')) {
            return redirect()->to('/');
        } else {
            $data['title'] = 'Private Room';
            $groups = new Groups_Model();
            $users = new User_Model();
            $votes = new Votes_Model();
            $requests = new Requests_Model();
            $l = new Logos_Model();
            $data['logo'] = $l->first();
            $data['members'] = $requests->select('*')->join('user', 'user.user_id=requests.user_id');
            $data['members'] = $requests->where('group_id', $id)->findAll();
            $data['member'] = $requests->where('user_id', session('user_id'));
            $data['member'] = $requests->where('group_id', $id);
            $data['member'] = $requests->where('has_joined', 'true')->first();
            $data['votes'] = $votes->where('type', 'private');
            $data['votes'] = $votes->where('group_id', $id);
            $data['votes'] = $votes->where('status', 'active')->orderBy('vote_id', 'desc')->findAll();

            return view('panel/user/single_voting', $data);
        }
    }
    function addVote($id)
    {

        $validation = [
            "title" => 'required|trim|max_length[255]',
            "question" => 'required|trim|max_length[255]',
            "teamA" => 'required|trim',
            "teamB" => 'required',
            "category" => 'required|trim',
            "subCategory" => 'trim',
            "description" => 'required|trim|min_length[15]|max_length[150]',
            'banner1' => [
                'rules' => 'uploaded[banner1]'
                    . '|is_image[banner1]'
                    . '|mime_in[banner1,image/jpg,image/jpeg,image/gif,image/png]'

            ],
            'banner2' => [
                'rules' => [
                    'uploaded[banner2]',
                    'mime_in[banner2,image/jpg,image/jpeg,image/png]',
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
            } else if ($this->validator->hasError('question')) {
                $data = [
                    'status' => false,
                    'message' => $this->validator->getError('question'),
                ];
                echo json_encode($data);
            } else if ($this->validator->hasError('teamA')) {
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
            } else if ($this->validator->hasError('banner1')) {
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
            $file1 = $this->request->getFile('banner1');
            $file2 = $this->request->getFile('banner2');
            $group_id = $id;
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
                'type' => 'private',
                'group_id' => $id,
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
