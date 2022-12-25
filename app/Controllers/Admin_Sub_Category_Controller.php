<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Category_Model;
use App\Models\Sub_Category_Model;
use App\Models\Logos_Model;


class Admin_Sub_Category_Controller extends BaseController
{

    public function index()
    {
        
        if(session('isLoggedIn')==true && session('type') == 'admin'){
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $l = new Logos_Model();

        $data['logo'] =$l->first();
        $data['title'] = 'Admin | Sub Category';
        $data['category'] = $cat->findAll();
        $data['sub_category'] = $sub_cat->select()->join('category', 'sub_category.cat_id=category.cat_id')->findAll();
    
        return view('admin/sub_category', $data);
        }
    else{
        return redirect()->to('/');
    }
    }
    function getSubCategory($id = null)
    {
        if ($this->request->isAJAX()) {

            $sub_cat = new Sub_Category_Model();
            $data = $sub_cat->select('	sub_cat_id ,sub_cat_title,cat_id')->where('cat_id', $id)->findAll();
            if ($data) {
                return json_encode($data);
            }
        } else
            return null;
    }
    public function addSubCategory()
    {
        $cat = new Category_Model();
        $parent_id = $this->request->getPost('category');
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'title' => [
                    'rules'  => 'required|min_length[2]|max_length[100]|is_unique[sub_category.sub_cat_title]',
                    'errors' => [
                        'required' => 'Sub Category name is required',
                        'min_length' => 'Sub Category name at least 5 character',
                        'max_length' => 'Sub Category name not greater than 100 character',
                        'is_unique' => 'Sub Category name already taken',
                    ]
                ]
            ];

            if ($this->validate($rules)) {
                $sub_cat = new Sub_Category_Model();
                $name = $this->request->getVar('title');
                $status = $this->request->getVar('status');

                $cat->set('have_sub_cat', 1);
                $cat->where('cat_id', $parent_id);
                $res = $cat->update();
                if ($res) {
                    //sub category added successfully
                    $data = [
                        'sub_cat_title' => $name,
                        'status' => $status,
                        'cat_id' => $parent_id
                    ];
                    $query = $sub_cat->insert($data);
                    echo 1;
                } else {
                    //error while adding sub category data
                    echo 2;
                }
            } else {
                //rules not validated
                echo 0;
            }
        }
    }
    public function editSubCategory($id)
    {
        if ($this->request->getMethod() == 'post') {

            $rules = [
                'title' => [
                    'rules'  => 'required|min_length[2]|max_length[100]',
                    'errors' => [
                        'required' => 'Sub Category name is required',
                        'min_length' => 'Sub Category name at least 5 character',
                        'max_length' => 'Sub Category name not greater than 100 character',
                    ]
                ]
            ];
            if ($this->validate($rules)) {
                $cat_id = $this->request->getPost('category');
                $sub_cat_title = $this->request->getPost('title');
                $status = $this->request->getPost('status');

                $cat = new Category_Model();
                $sub_cat = new Sub_Category_Model();
                $cat->set('have_sub_cat', 1);
                $cat->where('cat_id', $cat_id);
                $query = $cat->update();
                $sub_cat->set('sub_cat_title', $sub_cat_title);
                $sub_cat->set('status', $status);
                $sub_cat->set('cat_id', $cat_id);
                $sub_cat->where('sub_cat_id', $id);
                $query2 = $sub_cat->update();
                if ($query && $query2) {
                    
                    //data updated
                    echo 1;
                } else {
                    //failed to update data
                    echo 2;
                }
            } else {
                //validation failed
                echo 3;
            }
        }
    }
    public function deleteSubCategory($id = null)
    {
        $sub_cat = new Sub_Category_Model();
        $res = $sub_cat->delete(['sub_cat_id' => $id]);
        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
