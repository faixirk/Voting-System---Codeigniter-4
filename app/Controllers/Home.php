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
use App\Models\Social_Links_Model;
use App\Models\Breadcrumb_Model;

class Home extends BaseController
{
    public function index()
    {

        $data['title'] = 'Daily Voting';
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $group = new Groups_Model();
        $user = new User_Model();
        $requests = new Requests_Model();
        $votes = new Votes_Model();
        $results = new Votes_Results_Model();
        $l = new Logos_Model();
        $breadcrumb = new Breadcrumb_Model();
        $data['breadcrumb'] = $breadcrumb->first();
        $data['categories'] = $cat->findAll();
        $data['groups'] = $group->findAll();
        $data['requests'] = $requests->findAll();
        $data['user'] = $user->findAll();
        $data['logo'] = $l->first();

        $data['votes'] = $votes->where('status', 'active')->orderBy('vote_id', 'desc');
        $data['votes'] = $votes->where('type', 'public')->findAll();

        //Both quereis can be used to find sub categories
        // $data['sub_categories'] = $sub_cat->findAll();
        $data['sub_categories'] = $sub_cat->select()->join('category', 'category.cat_id=sub_category.cat_id')->findAll();
        // $data['votes'] = $cat->select()
        // ->join('votes', 'votes.category_id=category.cat_id')->join('sub_category', 'sub_category.cat_id=votes.category_id')->findAll();
        // $data['votes'] = $cat->where('type','public');
        die();
        return view('index', $data);
    }
    public function getCategory($id)
    {

        if ($id != null) {
            $data['title'] = 'Daily Voting';
            $votesModel = new Votes_Model();
            $votes = $votesModel->where('status', 'active');
            $votes = $votesModel->where('type', 'public');
            if ($id != 999) {
                $votes = $votesModel->where('category_id', $id)->orderBy('vote_id', 'DESC')->findAll();
            } else {
                $votes = $votesModel->orderBy('vote_id', 'DESC')->findAll();
            }
            echo json_encode($votes);
        } else {
            return false;
        }
    }
    public function getRooms($id)
    {

        if ($id != null) {
            $data['title'] = 'Daily Voting';
            $group = new Groups_Model();
            if ($id == 0) {
                $groups = $group->orderBy('group_id', 'DESC')->findAll();
            } else {
                $groups = $group->where('cat_id', $id)->orderBy('group_id', 'DESC')->findAll();
            }
            echo json_encode($groups);

        } else {
            return false;
        }
    }
    function results()
    {

        $data['title'] = 'Results';
        $votes = new Votes_Model();
        $a = new About_Us_Model();
        $c = new Contact_Us_Model();
        $l = new Logos_Model();
        $social = new Social_Links_Model();
        $results = new Votes_Results_Model();
        $breadcrumb = new Breadcrumb_Model();


        $data['breadcrumb'] = $breadcrumb->first();
        $data['social'] = $social->findAll();
        $data['about'] = $a->first();
        $data['contact'] = $c->first();
        $data['logo'] = $l->first();

        $data['votes'] = $votes->where('status', 'result')->orderBy('vote_id', 'desc')->findAll();


        return view('results', $data);
    }
    public function about_us()
    {
        $data['title'] = 'About Us';
        $a = new About_Us_Model();
        $c = new Contact_Us_Model();
        $l = new Logos_Model();
        $social = new Social_Links_Model();
        $breadcrumb = new Breadcrumb_Model();

        $data['breadcrumb'] = $breadcrumb->first();
        $data['social'] = $social->findAll();
        $data['about'] = $a->first();
        $data['contact'] = $c->first();
        $data['logo'] = $l->first();


        return view('about_us', $data);
    }
    public function faq()
    {
        $data['title'] = 'FAQ';
        $l = new Logos_Model();
        $c = new Contact_Us_Model();
        $social = new Social_Links_Model();

        $data['social'] = $social->findAll();

        $data['contact'] = $c->first();
        $data['logo'] = $l->first();

        return view('faq', $data);
    }
    public function blog()
    {
        $data['title'] = 'Blog';
        $c = new Contact_Us_Model();
        $l = new Logos_Model();

        $data['contact'] = $c->first();
        $data['logo'] = $l->first();
        $social = new Social_Links_Model();

        $data['social'] = $social->findAll();

        return view('blog', $data);
    }
    public function contact()
    {
        $data['title'] = 'Contact';
        $c = new Contact_Us_Model();
        $l = new Logos_Model();
        $social = new Social_Links_Model();

        $data['social'] = $social->findAll();
        $data['logo'] = $l->first();
        $data['contact'] = $c->first();
        return view('contact', $data);
    }
}
