<?php
namespace App\Controllers;
use App\Controllers\BaseController;


class Groups_Controller extends BaseController{
    public function index(){
        $data['title'] = "Groups";
        return view('panel/user/groups', $data);

    }
}