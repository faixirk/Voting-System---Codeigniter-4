<?php namespace App\Controllers;

use App\Models\User_Model;

class User_Login extends BaseController{
    public function index(){
        $data['title']= 'User Login';
        return view('login', $data);
    }
    protected function setUserSession($user){
        $data = [
         'user_id' => $user['user_id'],
         'username' => $user['username'],
         'useremail' =>$user['useremail'],
         'country_code' =>$user['country_code'],
         'phone_number' =>$user['phone_number'],
         'pic' => $user['pic'],
         'isLoggedIn' => true 
        ];
        session()->set($data);
        return true;
    }

    public function reset_password(){
        $data['title'] = 'Forgot Password';
        return view('reset_password', $data);
    }
}