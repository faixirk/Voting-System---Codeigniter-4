<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\User_Model;
use App\Models\Logos_Model;
use App\Libraries\Validation;

class User_Profile_Controller extends BaseController
{

    public function index()
    {
        $data = [];
        $data['title'] = 'User | Profile';
        if (!session('isLoggedIn')) {
            return redirect()->to('/');
        } else {
            $user = new User_Model();
            $l = new Logos_Model();
            $data['logo'] = $l->first();
            $data['user'] = $user->where('user_id', session('user_id'))->first();

            return view('panel/user/profile', $data);
        }
    }
    public function profileUpdate()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            //validation rules
            $rules = [

                'firstname' => [
                    'rules' => 'required|min_length[3]|max_length[40]',
                    'errors' => [
                        'required' => 'First name is required',
                        'min_length' => 'Minimum length is 3 characters short',
                        'max_length' => 'Maximuim length is 40 characters long'
                    ]
                ],
                'lastname' => [
                    'rules' => 'required|min_length[3]|max_length[40]',
                    'errors' => [
                        'required' => 'First name is required',
                        'min_length' => 'Minimum length is 3 characters short',
                        'max_length' => 'Maximuim length is 40 characters long'
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $user = new User_Model();
                $f_name = $this->request->getPost('firstname');
                $l_name = $this->request->getPost('lastname');
                $emailCheck = $user->where('user_id', session('user_id'))->first();
                if ($emailCheck) {
                    $user->set('first_name', $f_name);
                    $user->set('last_name', $l_name);
                    $user->where('user_id', session('user_id'));
                    $query = $user->update();
                    if ($query) {
                        //user user name updated successfully
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
    public function passwordUpdate()
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
                $model = new User_Model();
                $user_info = $model->where('user_id', session('user_id'))->first();
                // verifying with db
                if (password_verify($this->request->getPost('current_password'), $user_info['user_pass'])) {
                    // make is the custom lib fun -> convert pass into hash
                    $pass = Validation::make($this->request->getPost('password'));
                    $model->set('user_pass', $pass);
                    $id = session('user_id');
                    $model->where('user_id', $id);
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
    public function loadLogo()
    {
        $header = new User_Model();
        $data = $header->first();
        echo json_encode($data);
    }

    public function profileimageUpdate()
    {
        $validationRule = [
            'profileimage' => [
                'rules' => [
                    'uploaded[profileimage]',
                    'mime_in[profileimage,image/jpg,image/jpeg,image/png]',
                ]
            ],
        ];

        if (!$this->validate($validationRule)) {
            echo 2;
        } else {
            if ($file = $this->request->getFile('profileimage')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $old_pic = session('pic');

                    $path = './public/uploads/profile/';
                    if ($old_pic != 'avatar.jpg') {
                        if (is_file($path . $old_pic)) {
                            unlink($path . $old_pic);
                        }
                    }
                    $newName = $file->getRandomName();
                    $file->move($path, $newName);
                    $user = new User_Model();
                    // gives UPDATE `mytable` SET `field` = 'field' WHERE `id` = ?
                    $user->set('pic', $newName);
                    $user->where('user_id', session('user_id'));
                    $query = $user->update();
                    if ($query) {
                        session()->set('pic', $newName);
                        $data = [
                            'success' => true,
                            'message' => "Successfully Updated!",
                            'path' => $newName
                        ];
                        //success
                        return $this->response->setJSON($data);
                    } else {
                        //query failed
                        echo 3;
                    }
                } else {
                    //file not valid and has moved
                    echo 4;
                }
            } else {
                //file not get
                echo 5;
            }
        }
    }
}
