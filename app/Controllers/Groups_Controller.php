<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Groups_Model;
use App\Models\User_Model;
use App\Models\Requests_Model;

class Groups_Controller extends BaseController
{
    public function index()
    {
        $data['title'] = "Groups";
        return view('panel/user/groups', $data);
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
            $query = $group->insert($data);
            if ($query) {
                //data inserted 
                echo 1;
            } else {
                //query failed
                echo 2;
            }
        } else {
            //data not validated
            echo 3;
        }
    }
    public function requests_index()
    {
        $data['title'] = 'Requests | User';
        $requests = new Requests_Model();
        //--------- join requests->groups && requests->users ----------------------------------------------
        $data['requests'] = $requests->select()->join('groups', 'groups.group_id=requests.group_id')->join('user', 'user.user_id=requests.user_id');
        //-------------------- END 'JOIN' -----------------------------------------------------------------

        //------------------- find all data where creator id matches session id of user --------------------
        $data['requests'] = $requests->where('creator_id', session('user_id'))->findAll();
        //----------------------- END 'WHERE' --------------------------------------------------------------

    
        return view('panel/user/requests', $data);
    }
    public function requests($id)
    {
        $data = [];
        $group = new Groups_Model();
        $user = new User_Model();
        $requests = new Requests_Model();
        $userID = session('user_id');
        $checkGroup = $group->where('group_id', $id)->findAll();  //matches the group id from user passed to groups table
        $checkUser = $requests->select('*');
        $checkUser = $requests->where('group_id', $id);
        $checkUser = $requests->where('user_id', $userID)->get()->getResult();
        
       
        if(session('isLoggedIn') == true){  //true if user is logged in
            $data = [
                'user_id' => session('user_id'),   //user who is logged in
                'group_id' => $id,                
                'creator_id' => $checkGroup[0]['user_id'],  //user who created the group
                'status' => '1'   //request sent => 1 otherwise 0
            ];
            if(!$checkUser){ //if request is not already sent then true
            $query = $requests->insert($data);
            if ($query) {
                //query successful
                echo 0;
            } else {
                // query failed to update
                echo 1;
            } 
        }
            else{
                //request already sent
                echo 2;
            }
        }
        else{
            //true if user is not logged in
               echo 3;
        }
    }
    public function setRequest($id){
         $requests = new Requests_Model();
         $check = $requests->where('group_id', $id)->first();
         if($check){
         $requests->set('has_joined', 'true');
         $requests->where('group_id', $id);
         $query = $requests->update();
        
         if($query){
            //has joined set to 1
            echo 1;
         }
         else{
            //query failed
            echo 2;
         }
        }
        else{
            echo 2;
        }
    }
    public function deleteRequest($id){
        $request = new Requests_Model();
        $query = $request->delete($id);
        if($query){
            //record deleted successfully
            echo 1;
        }
        else{
            //query failed
            echo 2;
        }
    }
    public function private_index(){
        $data = [];
        $data['title'] = 'Private | User';
        $user = new User_Model();
        $groups = new Groups_Model();
        $data['private'] = $groups->select()->join('requests','requests.group_id=groups.group_id')->findAll();
        // $data['private'] = $request->where('user_id', $userID)->get()->getResult();
        // echo '<pre>';
        // print_r($data);
        // die();
        return view('panel\user\private_voting', $data);
    }
    public function single_room($id){
        $data['title'] = 'Private Room';
        $groups = new Groups_Model();
        $users = new User_Model();
        $requests = new Requests_Model();
        $data['members'] = $requests->select('*')->join('user','user.user_id=requests.user_id');
        $data['members'] = $requests->where('group_id', $id)->findAll();
        // echo '<pre>';
        // print_r($data);
        // die();
        return view('panel/user/single_voting', $data);
    }
}
