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
                    'is_unique' => 'Enter a unique {field} address.'
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
            } else if ($this->validator->hasError('l_name')) {
                $data = [
                    'status' => false,
                    'type' => "Last Name",
                    'message' => $this->validator->getError('l_name'),
                ];
                return $this->response->setJSON($data);
                // echo sprintf('{"type":"l_name","message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('l_name')))));
            } else if ($this->validator->hasError('email')) {
                $data = [
                    'status' => false,
                    'type' => "Email",
                    'message' => $this->validator->getError('email'),
                ];
                return $this->response->setJSON($data);
                // echo sprintf('{"type":"email""message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('email')))));
            } else if ($this->validator->hasError('password')) {
                $data = [
                    'status' => false,
                    'type' => "Password",
                    'message' => $this->validator->getError('password'),
                ];
                return $this->response->setJSON($data);
                // echo sprintf('{"type":"password""message":"%s"}', addslashes((preg_replace('/\s+/', ' ', $this->validator->getError('password')))));
            }
        } else {
            $code = md5(str_shuffle('abcdefghiklmnoprstuvwxyz' . time()));

            $user = new User_Model();
            $f_name = $this->request->getPost('f_name');
            $l_name = $this->request->getPost('l_name');
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $data = ['first_name' => $f_name, 'last_name' => $l_name, 'user_email' => $email, 'user_pass' => password_hash($password, PASSWORD_BCRYPT), 'code' => $code];
            $res = $user->save($data);
            if ($res) {
                $email1 = \Config\Services::email();

                $to = $this->request->getPost('email');
                $subject = 'Account Activation Link ';
                $message = 'Hi ' . $this->request->getPost('f_name') . ",<br><br>Thanks for registering at our website. Your account has been created "
                    . "successfully. Please click the link below to activate your account<br><br>"
                    . "<a href='" . base_url() . "/registration/activate/" . $code . "' target='_blank'>Activate Now</a><br><br>Regards,<br>Team Daily Voting";

                $email1->setTo($to);
                $email1->setFrom('system@dailyvoting.com', 'Account Created Successfully');

                $email1->setSubject($subject);
                $email1->setMessage($message);
                if ($email1->send()) {

                    echo sprintf('{"status":true,"message":"%s"}', 'Successfully Registered.');
                }
            } else {
                echo sprintf('{"status":false,"message":"%s"}', 'Failed to register.');
            }
        }
        exit();
    }
    public function activate($uniid = null)
    {
        $model = new User_Model();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
        $data = [];
        if (!empty($uniid)) {
            $userdata = $model->verifyUniid($uniid);
            if ($userdata) {
                if ($this->verifyExpiryTime($userdata->activation_date)) {
                    if ($userdata->status == 'inactive') {
                        $status = $model->updateStaus($uniid);
                        if ($status == true) {
                            $data['success'] = 'Account Activated successfully. Close the tab and return to login page.';
                        }
                    } else {
                        $data['success'] = 'Your account is already activated';
                    }
                } else {
                    $data['error'] = 'Sorry! Activation link was expired!';
                }
            } else {
                $data['error'] = 'Sorry! We are Unable to find your account';
            }
        } else {
            $data['error'] = 'Sorry! Unable to process your request';
        }
        return view('activate', $data);
    }
    public function verifyExpiryTime($regTime)
    {
        helper(['date', 'url']);
        $currTime = now();
        $registerTime = strtotime($regTime);
        $diffTime = (int)$currTime - (int)$registerTime;
        if (3600 > $diffTime) {
            return true;
        } else {
            return false;
        }
    }
}
