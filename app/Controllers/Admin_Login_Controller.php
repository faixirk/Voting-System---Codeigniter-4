<?php

namespace App\Controllers;

use App\Libraries\Validation;
use CodeIgniter\Controller;
use App\Models\Admin_Model;
use App\Models\Breadcrumb_Model;

class Admin_Login_Controller extends BaseController
{
    public function index()
    {
        if (!session('isLoggedIn') && session('type') != 'admin') {
            $breadcrumb = new Breadcrumb_Model();
            $data['title'] = 'Login';
            $data['breadcrumb'] = $breadcrumb->first();
            return view('admin/admin_login', $data);
        } else {
            return redirect()->to('/admin/dashboard');
        }
    }
    public function loginVerify()
    {
        helper(['form']);
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[admin.admin_email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter a valid email address',
                    'is_not_unique' => 'This email is not registered on our service',
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[255]|',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Password must have at least 5 characted in length atleast',
                    'max_length' => 'Password must have not have more than 255 characters'
                ]
            ]
        ]);
        if (!$validation) {
            $data['title'] = 'Login';
            $data['validation'] = $this->validator;
            return view('admin/admin_login', $data); // 
        } else {
            $adminModel = new Admin_Model();
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $emailCheck = $adminModel->where('admin_email', $email)->first();

            $passwordCheck = Validation::check($password, $emailCheck['admin_pass']);
            if ($passwordCheck) {
                $this->setUserSession($emailCheck);
                return redirect()->to('admin/dashboard');
            } else {
                session()->setFlashdata('fail', 'Email or password don\'t match');

                return redirect()->to('admin');
            }
        }
    }
    public function setUserSession($user)
    {
        $data = [
            'id' => $user['admin_id'],
            'name' => $user['admin_name'],
            'email' => $user['admin_email'],
            'pic' => $user['admin_pic'],
            'type' => 'admin',
            'isLoggedIn' => true,

        ];
        session()->set($data);
        return true;
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
