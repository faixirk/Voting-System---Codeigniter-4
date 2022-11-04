<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_Model;

class Registration_Controller extends BaseController
{

    public function index()
    {
        $data['title'] = 'Registration';
        return view('register', $data);
    }
    function registrationUser()
    {
 

        helper(['form', 'url']);
        if (!$this->request->isAJAX()) {
            $data = [];
            $data['title'] = '404 Not Found';
            return view('404', $data);
            echo ('{"status": 404, "message": "Page not found"}');
        }
        $validation = [
            'f_name' => [
                'label'  => 'First Name',
                'rules'  => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Enter a valid {field} name.'
                ]
            ],
            'l_name' => [
                'label'  => 'Last Name',
                'rules'  => 'required|min_length[2]|max_length[50]',
                'errors' => [
                    'required' => 'Enter a valid {field} name.'
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email|is_unique[user.user_email,{email}]',
                'errors' => [
                    'required' => 'Enter a valid {field} address.',
                    'is_unique'=> 'Enter a unique {field} address.'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[8]|max_length[50]',
                'errors' => [
                    'required' => '{field} is required.',
                    'min_length' => '{field} must have atleast 8 characters in length.'
                ]
            ]
        ];
        if ($this->validate($validation) == FALSE) {
            if ($this->validator->hasError('f_name')) {
                $data = [
                    'status' => false,
                    'type' => "First Name", 
                    'message' => $this->validator->getError('f_name'),
                   ];
                   return $this->response->setJSON($data);

                // echo sprintf('{"type":"f_name","message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('f_name')))));
            }
            else if ($this->validator->hasError('l_name')) {
                $data = [
                    'status' => false,
                    'type' => "Last Name", 
                    'message' => $this->validator->getError('l_name'),
                   ];
                   return $this->response->setJSON($data);
                // echo sprintf('{"type":"l_name","message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('l_name')))));
            }

            else if ($this->validator->hasError('email')) {
                $data = [
                    'status' => false,
                    'type' => "Email", 
                    'message' => $this->validator->getError('email'),
                   ];
                   return $this->response->setJSON($data);
                // echo sprintf('{"type":"email""message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('email')))));
            }

            else if ($this->validator->hasError('password')) {
                $data = [
                    'status' => false,
                    'type' => "Password", 
                    'message' => $this->validator->getError('password'),
                   ];
                   return $this->response->setJSON($data);
                // echo sprintf('{"type":"password""message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('password')))));
            }
        } else {
            $user = new User_Model();
            $f_name = $this->request->getPost('f_name');
            $l_name = $this->request->getPost('l_name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $data = ['first_name' => $f_name, 'last_name' => $l_name, 'user_email' => $email, 'user_pass' => password_hash($password, PASSWORD_DEFAULT)];
            $res = $user->save($data);
            if ($res) {

                echo sprintf('{"status":true,"message":"%s"}', 'Successfully Register.');
                 
            } else {
                echo sprintf('{"status":false,"message":"%s"}', 'Failed to register.');
            }
        }
        exit();
    }
}
