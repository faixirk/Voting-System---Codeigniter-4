<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Category_Model;

class Admin_Category_Controller extends BaseController
{
    public function index()
    {
        $data['title'] = 'Admin | Category';
        $categories = new Category_Model();
        $data['categories'] = $categories->findAll();
        return view('admin/category', $data);
    }
  
    function getCategories(){
        $categories = new Category_Model();
        $data= $categories->select('cat_id ,cat_title,have_sub_cat')->findAll();
        if($data){
            return json_encode($data); 
        }
        return false;
    }
    public function addCategory()
    {
        

        if ($this->request->getMethod() == 'post') {

            $rules = [
                'title' => [
                    'rules'  => 'required|min_length[5]|max_length[100]|is_unique[category.cat_title]',
                    'errors' => [
                        'required' => 'Category name is required',
                        'min_length' => 'Category name at least 5 character',
                        'max_length' => 'Category name not greater than 100 character',
                        'is_unique' => 'Category name already taken',
                    ]

                ]

            ];
            if ($this->validate($rules)) {
                $model = new Category_Model();

                $name = $this->request->getPost('title');
                $status = $this->request->getPost('status');
                $icon = $this->request->getPost('icon');        
                        
                $newData = [
                            'cat_title'  => $name,
                            'cat_icon'   => $icon, // cat banner
                            'cat_status' => $status, // if 0 it mean inactive 
                            'admin_id' => session('id')

                        ];
                        $query = $model->insert($newData);
                        if($query){
                            //data inserted
                        echo 1;
                    } else {
                        //query failed
                        echo 2;
                    }
                
            } else {
                //validation failed
                echo 3;
            }
        }
    }
    public function deleteCategory($id = null){
        
    }
}
