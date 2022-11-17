<?php

namespace App\Controllers;

use App\Models\User_Model;
use CodeIgniter\CLI\Console;

class Login_Controller extends BaseController
{
    public function index()
    {
        if(!session('isLoggedIn')){
        $data['title'] = 'User Login';
        return view('login', $data);
        }
        else{
            return redirect()->to('user/dashboard');
        }
    }
    public function loginVerification()
    {
        helper(['form', 'url']);
        if ($this->request->isAJAX()) {
            $validation = [
                'email' => [
                    'label'  => 'Email',
                    'rules'  => 'required|valid_email',
                    'errors' => [
                        'required' => 'Enter a valid {field} address.'
                    ]
                ],
                'password' => [
                    'label'  => 'Password',
                    'rules'  => 'required|min_length[6]',
                    'errors' => [
                        'required' => '{field} is required.',
                        'min_length' => '{field} must have atleast 8 characters in length.'
                    ]
                ]
            ];

            if ($this->validate($validation) == FALSE) {
                if ($this->validator->hasError('email')) {
                    $data = [
                        'status' => false,
                        'message' => $this->validator->getError('email'),
                    ];
                    echo json_encode($data);
                    // echo sprintf('{"status":false,"message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('email')))));
                }

                if ($this->validator->hasError('password')) {
                    $data = [
                        'status' => false,
                        'message' => $this->validator->getError('password'),
                    ];
                    echo json_encode($data);
                    // echo sprintf('{"status":false,"message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('password')))));
                }
            } else {
                $user = new User_Model();
                $email = $this->request->getPost('email');
                $pass = $this->request->getPost('password');

                $user_info  = $user->where('user_email', $email)->first();
                if ($user_info) {

                    $verify = password_verify($pass, $user_info['user_pass']);

                    if ($verify) {
                        $responce = $this->setUserSession($user_info);
                        // $ses_data = [
                        //     'user_id'        => $user_info['user_id'],
                        //     'first_name'     => $user_info['first_name'],
                        //     'last_name'      => $user_info['last_name'],
                        //     'email'          => $user_info['user_email'],
                        //     'pic'          => $user_info['pic'],
                        //     // 'type'           => $user_info['type'],
                        //     'logged_in'      => TRUE
                        // ];
                        // session()->set($ses_data);
                        if ($responce) {
                            $data = [
                                'status' => true,
                                'message' => 'Successfully login'
                            ];
                            echo json_encode($data);
                        } else {
                            $data = [
                                'status' => false,
                                'message' => 'Failed to login'
                            ];
                            echo json_encode($data);
                        }
                    } else {

                        $data = [
                            'status' => false,
                            'message' => 'Incorrrect email and password'
                        ];
                        echo json_encode($data);
                        // echo sprintf('{"status":false,"message":"%s"}', 'Incorrect Password.');
                    }
                } else {
                    // die('asd');
                    // echo sprintf('{"status":false,"message":"%s"}', 'Email does not exist.');
                    $data = [
                        'status' => false,
                        'message' => 'Incorrect email and password'
                    ];
                    echo json_encode($data);
                }
                exit();
            }
            exit();
        }
    }
    private function setUserSession($user)
    {
        $data = [
            'user_id' => $user['user_id'],
            'f_name' => $user['first_name'],
            'l_name' => $user['last_name'],
            'useremail' => $user['user_email'],
            'pic' => $user['pic'],
            'type'=>'user',
            'isLoggedIn' => true
        ];
        session()->set($data);
        return true;
    }

    public function reset_password()
    {
        $data['title'] = 'Forgot Password';
        return view('reset_password', $data);
    }
    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
