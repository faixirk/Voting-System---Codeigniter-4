<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Logos_Model;
use App\Models\About_Us_Model;
use App\Models\Contact_Us_Model;
use App\Models\Social_Links_Model;

class Website_Settings_Controller extends BaseController
{
    public function index()
    {
        if (session('isLoggedIn') == true) {
            $l = new Logos_Model();
            $data['title'] = 'Logo Settings';
            $data['logo'] = $l->first();
            return view('admin/website_logo_settings', $data);
        } else {
            return redirect()->to('admin');
        }
    }
    public function index_breadcrumb()
    {
        if (session('isLoggedIn') == true) {

            $data['title'] = 'Breadcrumb';
            $l = new Logos_Model();

            $data['logo'] = $l->first();
            return view('admin/website_breadcrumb', $data);
        } else {
            return redirect()->to('admin');
        }
    }
    public function index_aboutUs()
    {
        $data['title'] = 'About Us';
        if (session('isLoggedIn') == true) {
            $a = new About_Us_Model();
            $l = new Logos_Model();

            $data['logo'] = $l->first();
            $data['about'] = $a->first();
            return view('admin/about_us', $data);
        } else {
            return redirect()->to('admin');
        }
    }
    public function index_contact()
    {
        $data['title'] = 'Contact Form';
        $l = new Logos_Model();

        $data['logo'] = $l->first();
        $c = new Contact_Us_Model();

        $data['contact'] = $c->first();
        return view('admin/contact_us', $data);
    }
    public function index_social()
    {
        if (session('isLoggedIn') == true) {

            $data['title'] = 'Social Links';
            $l = new Logos_Model();
            $social = new Social_Links_Model();

            $data['social'] = $social->findAll();
            $data['logo'] = $l->first();
            return view('admin/social', $data);
        } else {
            return redirect()->to('admin');
        }
    }
    public function index_slider()
    {
        $data['title'] = 'Slider';
        $l = new Logos_Model();
        if (session('isLoggedIn') == true) {

            $data['logo'] = $l->first();
            return view('admin/slider', $data);
        } else {
            return redirect()->to('admin');
        }
    }
    public function index_links()

    {
        if (session('isLoggedIn') == true) {
            $data['title'] = 'Add Social Links';
            $l = new Logos_Model();


            $data['logo'] = $l->first();
            return view('admin/add_social', $data);
        } else {
            return redirect()->to('admin');
        }
    }

    public function logo_update()
    {
        $validationRule = [
            'image' => [
                'rules' => [
                    'uploaded[image]',
                    'mime_in[image,image/jpg,image/jpeg,image/png]',
                ]
            ],

        ];

        if (!$this->validate($validationRule)) {
            echo 5;
        } else {
            $file1 = $this->request->getFile('image');

            if ($file1) {
                if ($file1->isValid() && !$file1->hasMoved()) {
                    $old_pic = $this->request->getPost('old_logo');

                    $path = './public/uploads/logo/';
                    if ($old_pic != 'avatar.jpg') {
                        if (is_file($path . $old_pic)) {
                            unlink($path . $old_pic);
                        }
                    }
                    $newName = $file1->getRandomName();

                    $file1->move($path, $newName);

                    $logo = new Logos_Model();
                    // gives UPDATE `mytable` SET `field` = 'field' WHERE `id` = ?
                    $logo->set('header_logo', $newName);

                    $query = $logo->update();
                    if ($query) {

                        // $logo->set('header_logo',$newName);

                        //success
                        echo 1;
                    } else {
                        //query failed
                        echo 2;
                    }
                } else {
                    //file not valid and has moved
                    echo 3;
                }
            } else {
                //file not get
                echo 4;
            }
        }
    }
    public function add_aboutUs()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'title' => [
                    'rules'  => 'required|min_length[2]|max_length[50]',
                ],
                'sub_title' => [
                    'rules'  => 'required|min_length[2]|max_length[50]',
                ],
                'description' => [
                    'rules'  => 'required|min_length[8]|max_length[800]',
                ],
            ];
            if ($this->validate($rules)) {
                $title = $this->request->getPost('title');
                $sub_title = $this->request->getPost('sub_title');
                $description = $this->request->getPost('description');


                $image = $this->request->getFile('image');
                if ($image->isValid() && !$image->hasMoved()) {
                    $old_pic = $this->request->getPost('old_logo');

                    $path = './public/uploads/about/';
                    if ($old_pic != 'avatar.jpg') {
                        if (is_file($path . $old_pic)) {
                            unlink($path . $old_pic);
                        }
                    }
                    $newName = $image->getRandomName();
                    $image->move($path, $newName);
                    $about = new About_Us_Model();
                    // gives UPDATE `mytable` SET `field` = 'field' WHERE `id` = ?
                    $about->set('image', $newName);
                    $about->set('title', $title);
                    $about->set('sub_title', $sub_title);
                    $about->set('description', $description);
                    $about->set('admin_id', session('id'));
                    $query = $about->update();
                    if ($query) {
                        //data inserted
                        echo 1;
                    } else {
                        //data not inserted
                        echo 2;
                    }
                }
            } else {
                //validation failed
                echo 3;
            }
        }
    }
    public function add_contactUs()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'heading' => [
                    'rules'  => 'required|min_length[2]|max_length[50]',
                ],
                'sub_heading' => [
                    'rules'  => 'required|min_length[2]|max_length[50]',
                ],
                'short_description' => [
                    'rules'  => 'required|min_length[8]|max_length[500]',
                ],
                'address' => [
                    'rules'  => 'required|min_length[5]|max_length[150]',
                ],
                'house' => [
                    'rules'  => 'required|min_length[4]|max_length[50]',
                ],
                'email' => [
                    'rules'  => 'required|min_length[6]|max_length[40]',
                ],
                'phone' => [
                    'rules'  => 'required|min_length[8]|max_length[20]',
                ],
                'footer_short_details' => [
                    'rules'  => 'required|min_length[8]|max_length[200]',
                ],
            ];
            if ($this->validate($rules)) {
                $heading = $this->request->getPost('heading');
                $sub_heading = $this->request->getPost('sub_heading');
                $short_description = $this->request->getPost('short_description');
                $address = $this->request->getPost('address');
                $house = $this->request->getPost('house');
                $email = $this->request->getPost('email');
                $phone = $this->request->getPost('phone');
                $footer_short_details = $this->request->getPost('footer_short_details');




                $contact = new Contact_Us_Model();
                // gives UPDATE `mytable` SET `field` = 'field' WHERE `id` = ?
                $contact->set('heading', $heading);
                $contact->set('sub_heading', $sub_heading);
                $contact->set('short_description', $short_description);
                $contact->set('address', $address);
                $contact->set('house', $house);
                $contact->set('email', $email);
                $contact->set('phone', $phone);
                $contact->set('footer_short_details', $footer_short_details);
                $contact->set('admin_id', session('id'));
                $query = $contact->update();
                if ($query) {
                    //data inserted
                    echo 1;
                } else {
                    //data not inserted
                    echo 2;
                }
            } else {
                //validation failed
                echo 3;
            }
        }
    }
    public function linksUpdate()
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => [
                    'rules'  => 'required|min_length[2]|max_length[50]|is_unique[social_links.name]',
                ],
                'icon' => [
                    'rules'  => 'required',
                ],

                'link' => [
                    'rules'  => 'required|min_length[8]|max_length[800]',
                ],
            ];
            if ($this->validate($rules)) {
                $name = $this->request->getPost('name');
                $icon = $this->request->getPost('icon');
                $link = $this->request->getPost('link');

                $social = new Social_Links_Model();
                $data = [
                    'name' => $name,
                    'icon' => $icon,
                    'link' => $link,
                    'admin_id' => session('id')
                ];

                $query = $social->insert($data);
                if ($query) {
                    //data inserted
                    echo 1;
                } else {
                    //data not inserted
                    echo 2;
                }
            } else {
                //validation failed
                echo 3;
            }
        }
    }

    public function linksEditView($id)
    {
        if (session('isLoggedIn') == true) {

            $data['title'] = 'Edit Social Links';
            $l = new Logos_Model();
            $social = new Social_Links_Model();

            $data['logo'] = $l->first();
            $data['social'] = $social->select();
            $data['social'] = $social->where('id', $id)->first();

            return view('admin/edit_social', $data);
        } else {
            return redirect()->to('admin');
        }
    }
    public function linksEdit($id)
    {
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => [
                    'rules'  => 'required|min_length[2]|max_length[50]|is_unique[social_links.name]',
                ],
                'icon' => [
                    'rules'  => 'required',
                ],

                'link' => [
                    'rules'  => 'required|min_length[8]|max_length[800]',
                ],
            ];
            if ($this->validate($rules)) {
                $name = $this->request->getPost('name');
                $icon = $this->request->getPost('icon');
                $link = $this->request->getPost('link');

                $social = new Social_Links_Model();

                $social->set('name', $name);
                $social->set('icon', $icon);
                $social->set('link', $link);
                $social->where('id', $id);
                $query = $social->update();
                if ($query) {
                    //data inserted
                    echo 1;
                } else {
                    //data not inserted
                    echo 2;
                }
            } else {
                //validation failed
                echo 3;
            }
        }
    }
    public function linkDelete($id)
    {
        $social = new Social_Links_Model();
        $query = $social->delete($id);
        if ($query) {
            //deleted successfully
            echo 1;
        } else {
            //issue in query
            echo 0;
        }
    }
}
