<?php

namespace App\Controllers;

use App\Models\User_Model;
use App\Models\Logos_Model;
use CodeIgniter\CLI\Console;

class Login_Controller extends BaseController
{
    public function index()
    {
        if (!session('isLoggedIn')) {
            $data['title'] = 'User Login';
            return view('login', $data);
        } else {
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
                    'rules'  => 'required|valid_email|trim',
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
                        if ($user_info['status'] == 'active') {
                            $responce = $this->setUserSession($user_info);

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
                                'message' => 'Your email is not verified'
                            ];
                            echo json_encode($data);
                        }
                    } else {

                        $data = [
                            'status' => false,
                            'message' => 'Incorrrect email or password'
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
            'type' => 'user',
            'isLoggedIn' => true
        ];
        session()->set($data);
        return true;
    }

    public function index_forgot_password()
    {
        $data['title'] = 'Forgot Password';
        $l = new Logos_Model();
        $data['logo'] = $l->first();
        return view('forgot_password', $data);
    }
    public function forgot_password()
    {
        $data['title'] = 'Forgot Password';
        $l = new Logos_Model();
        $data['logo'] = $l->first();
        $email = $this->request->getPost('email');
        $user = new User_Model();
        $checkUser = $user->where('user_email', $email)->first();
        if ($checkUser) {
            if ($user->updatedAt($checkUser['code'])) {
                $to = $email;
                $subject = 'Reset Password Link';
                $token = $checkUser['code'];
                $message = 'Hi ' . $checkUser['first_name'] . '<br><br>'
                    . 'Your reset password request has been received. Please click'
                    . 'the below link to reset your password.<br><br>'
                    . '<a href="' . base_url() . '/login/reset_password/' . $token . '">Click here to Reset Password</a><br><br>'
                    . 'Thanks<br>Team Daily Voting';
                $email = \Config\Services::email();
                $email->setTo($to);
                $email->setFrom('system@dailyvoting.com', 'Daily Voting');
                $email->setSubject($subject);
                $email->setMessage($message);
                if ($email->send()) {
                    echo 0;
                } else {
                    //email not sent
                    echo 3;
                }
            } else {
                //unable to update data
                echo 2;
            }
        } else {
            //email does not exists
            echo 1;
        }
    }
    public function reset_passwordView($code)
    {
        $data['title'] = 'Reset Password';

        return view('reset_password', $data);
    }
    public function reset_password($code)
    {
        $user = new User_Model();

        if (!empty($code)) {
            $userdata = $user->verifyToken($code);
            if (!empty($userdata)) {
                if ($this->checkExpiryDate($userdata['updated_at'])) {
                    if ($this->request->getMethod() == 'post') {
                        $rules = [
                            'pwd' => [
                                'label' => 'Password',
                                'rules' => 'required|min_length[8]|max_length[16]',
                            ],
                            'cpwd' => [
                                'label' => 'Confirm Password',
                                'rules' => 'required|matches[pwd]'
                            ],
                        ];
                        if ($this->validate($rules)) {
                            $pass =  password_hash($this->request->getPost('pwd'), PASSWORD_BCRYPT);
                            if ($user->updatePassword($code, $pass)) {
                                echo 0;
                            } else {
                                echo 1;
                            }
                        } else {
                            $data['validation'] = $this->validator;
                        }
                    }
                } else {
                    //link expired
                    echo 2;
                }
            } else {
                //user not found
                echo 3;
            }
        } else {
            //unauthorized access
            echo 4;
        }
    }
    public function checkExpiryDate($time)
    {
        $timeDiff = strtotime(date("Y-m-d h:i:s")) - strtotime($time);
        if ($timeDiff < 900) {
            return true;
        } else {
            return false;
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
