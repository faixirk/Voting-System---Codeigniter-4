<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Admin_Model;
use App\Libraries\Validation;

class Admin_Password_Controller extends BaseController
{

    public function index()
    {
        $data['title'] = 'Admin | Password';
        return view('admin/password_update', $data);
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
                if (password_verify($this->request->getPost('password'), $admin_info['admin_pass'])) {
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
