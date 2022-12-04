<?php

namespace App\Controllers;
use App\Models\Category_Model;
use App\Models\Sub_Category_Model;
use App\Models\Groups_Model;
use App\Models\User_Model;
use App\Models\Requests_Model;
use App\Models\Votes_Model;
use App\Models\Votes_Results_Model;
use App\Models\About_Us_Model;
use App\Models\Contact_Us_Model;
use App\Models\Logos_Model;

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
        $votes = new Votes_Model();
        $results = new Votes_Results_Model();
        $l = new Logos_Model();

        $data['categories'] = $cat->findAll();
        $data['groups'] = $group->findAll();
        $data['requests'] = $requests->findAll();
        $data['user'] = $user->findAll();
        $data['logo'] = $l->first();

        $data['votes'] = $votes->where('type','public')->findAll();


        //Both quereis can be used to find sub categories
        // $data['sub_categories'] = $sub_cat->findAll();
        $data['sub_categories'] = $sub_cat->select()->join('category', 'category.cat_id=sub_category.cat_id')->findAll();
        // $data['votes'] = $cat->select()
        // ->join('votes', 'votes.category_id=category.cat_id')->join('sub_category', 'sub_category.cat_id=votes.category_id')->findAll();
        // $data['votes'] = $cat->where('type','public');
        return view('index', $data);
    }
    public function about_us(){
        $data['title'] = 'About Us';
        $a = new About_Us_Model();
        $c = new Contact_Us_Model();
        $l = new Logos_Model();

        $data['about'] = $a->first();
        $data['contact'] = $c->first();
        $data['logo'] = $l->first();

        return view('about_us', $data);
    }
    public function faq(){
        $data['title'] = 'FAQ';
        $l = new Logos_Model();
        $c = new Contact_Us_Model();

        $data['contact'] = $c->first();
        $data['logo'] = $l->first();

        return view('faq', $data);
    }
    public function blog(){
        $data['title'] = 'Blog';
        $c = new Contact_Us_Model();
        $l = new Logos_Model();

        $data['contact'] = $c->first();
        $data['logo'] = $l->first();

        return view('blog', $data);
    }
    public function contact(){
        $data['title'] = 'Contact';
        $c = new Contact_Us_Model();
        $l = new Logos_Model();

        $data['logo'] = $l->first();
        $data['contact'] = $c->first();
        return view('contact', $data);
    }
}
