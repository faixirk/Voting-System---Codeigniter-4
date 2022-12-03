<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_Model;

class Admin_User_Controller extends BaseController{
    
    public function index(){
        $data = [];
        if(session('type') == 'admin'){
        $data['title'] = 'All Users';
        $user = new User_Model();
        $data['users'] = $user->findAll();
             
        return view('admin/users', $data);
    }
    else{
        return redirect()->to('./');
    }
    }
    public function deleteUser($id){
        $user = new User_Model();
        $query = $user->delete($id);
        if($query){
        //user deleted successfully
            echo 1;            
        }
        else{
            //user not deleted. Query failed
        echo 2;
        }
    }
}