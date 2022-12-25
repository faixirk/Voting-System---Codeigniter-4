<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_Model;
use App\Models\Logos_Model;

class Admin_Profile_Controller extends BaseController
{

    public function index()
    {
        if (!session('isLoggedIn') && session('type') != 'admin') {
            return redirect()->to('admin');
        } 
        else {

            $data['title'] = 'Admin | Profile';
            $l = new Logos_Model();

            $data['logo'] = $l->first();
            return view('admin/profile', $data);
        }
    }
    public function profileUpdate()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            //validation rules
            $rules = [

                'username' => [
                    'rules' => 'required|min_length[3]|max_length[40]',
                    'errors' => [
                        'required' => 'Username is required',
                        'min_length' => 'Minimum length is 3 characters short',
                        'max_length' => 'Maximuim length is 40 characters long'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $admin = new Admin_Model();
                $name = $this->request->getPost('username');
                $emailCheck = $admin->where('admin_id', session('id'))->first();
                if ($emailCheck) {
                    $admin->set('admin_name', $name);
                    $admin->where('admin_id', session('id'));
                    $query = $admin->update();
                    if ($query) {
                        //admin user name updated successfully
                        echo 1;
                    } else {

                        echo 0;
                    }
                } else {
                    //email not verified
                    echo 3;
                }
            } else {
                //validation failed
                echo 2;
            }
        }
    }
}
