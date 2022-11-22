<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Groups_Model;
use App\Models\User_Model;

class Groups_Controller extends BaseController{
    public function index(){
        $data['title'] = "Groups";
        return view('panel/user/groups', $data);

    }
    public function add_group(){
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
        if($this->validate($rules)){
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
           if($query){
            //data inserted 
            echo 1;
           }
           else{
            //query failed
            echo 2;
           }
        }
        else{
            //data not validated
            echo 3;
        }
    }
    public function requests_index(){
        $data['title'] = 'Requests | User';

        return view('panel/user/requests', $data);

    }
    public function requests($id){
        $data = [];
        // die('sss');
        $group = new Groups_Model();
        $user = new User_Model();
        $data['groups'] = $group->select()->join('user', 'groups.user_id=user.user_id')->findAll();
        echo '<pre>';
        print_r($data);
        die();
        return view('panel/user/requests', $data);
    }
}