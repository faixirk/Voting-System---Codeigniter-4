<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_Model;
use App\Libraries\Validation;
use App\Models\Logos_Model;

class Admin_Password_Controller extends BaseController
{

    public function index()
    {
        if (session('isLoggedIn') == true && session('type') == 'admin') {
            $l = new Logos_Model();

            $data['logo'] =$l->first();
            $data['title'] = 'Admin | Password';
            return view('admin/password_update', $data);
        } else {
            return redirect()->to('/');
        }
    }
    public function updatePassword()
    {

        if ($this->request->getMethod() == 'post') {
            // validation  
            $rules = [
                'current_password' => [
                    'rules'  => 'required|max_length[255]',
                    'errors' => [
                        'required'  => 'Old password is required',
                    ]
                ],
                'password' => [
                    'rules'  => 'required|min_length[8]|max_length[255]',
                    'errors' => [
                        'required'  => 'New password is required',
                        'min_length' => 'Password must have atleast 8 character in length',
                    ]
                ],
                'password_confirmation' => [
                    'rules'  => 'required|min_length[8]|max_length[255]',
                    'errors' => [
                        'required'  => 'New password is required',
                        'min_length' => 'Password must have atleast 8 character in length',
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $model = new Admin_Model();
                $admin_info = $model->where('admin_id', session('id'))->first();
                // verifying with db
                if (password_verify($this->request->getPost('current_password'), $admin_info['admin_pass'])) {
                    // make is the custom lib fun -> convert pass into hash
                    $pass = Validation::make($this->request->getPost('password'));
                    $model->set('admin_pass', $pass);
                    $id = session('id');
                    $model->where('admin_id', $id);
                    $query = $model->update();
                    if ($query) {
                        // successfully update
                        echo 1;
                    } else {
                        echo 3;
                    }
                } else {
                    // incorrect pass
                    echo 2;
                }
            } else {
                // invalid error occured
                echo 3;
            }
        }
    }
}
