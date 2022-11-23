<?php

namespace App\Controllers;
use App\Models\Category_Model;
use App\Models\Sub_Category_Model;
use App\Models\Groups_Model;
use App\Models\User_Model;
use App\Models\Requests_Model;


class Home extends BaseController
{
    public function index()
    { 
        $data['title'] = 'Voting System';
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $group = new Groups_Model();
        $user = new User_Model();
        $requests = new Requests_Model();
        $data['requests'] = $requests->select()->join('user', 'user.user_id=requests.user_id')->findAll();
        $data['categories'] = $cat->findAll();
        $data['groups'] = $group->findAll();
        $data['user'] = $user->findAll();
        // echo '<pre>';
        // print_r($data);
        // die();
        //Both quereis can be used to find sub categories
        // $data['sub_categories'] = $sub_cat->findAll();
        $data['sub_categories'] = $sub_cat->select()->join('category', 'category.cat_id=sub_category.cat_id')->findAll();
       
        return view('index', $data);
    }
    public function about_us(){
        $data['title'] = 'About Us';
        return view('about_us', $data);
    }
    public function faq(){
        $data['title'] = 'FAQ';
        return view('faq', $data);
    }
    public function blog(){
        $data['title'] = 'Blog';
        return view('blog', $data);
    }
    public function contact(){
        $data['title'] = 'Contact';
        return view('contact', $data);
    }
}
