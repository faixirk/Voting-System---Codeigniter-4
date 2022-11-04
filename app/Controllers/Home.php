<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
         
        $data['title'] = 'Voting System';
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
