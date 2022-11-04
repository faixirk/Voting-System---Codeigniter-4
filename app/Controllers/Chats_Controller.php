<?php
namespace App\Controllers;
use App\Controllers\BaseController;


class Chats_Controller extends BaseController{
    public function index(){
        $data['title'] = "Chats";
        return view('panel/user/chats', $data);

    }
}