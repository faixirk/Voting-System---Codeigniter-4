<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Category_Model;
use App\Models\Sub_Category_Model;


class Admin_Sub_Category_Controller extends BaseController{

    public function index(){
        $cat = new Category_Model();
        $sub_cat = new Sub_Category_Model();
        $data=[];
        $data['title'] = 'Admin | Sub Category';
        $data['category'] = $cat->findAll();
        $data['sub_category'] = $sub_cat->select()->join('category', 'sub_category.cat_id=category.cat_id')->findAll();
        // echo '<pre>';
        // print_r($data);
        // die('asdd');
        return view('admin/sub_category', $data);
    }
    
    public function addSubCategory(){
        $cat = new Category_Model();
        $parent_id = $this->request->getPost('category');
        if($this->request->getMethod() == 'post'){
            $rules = [
                'name' => [
                    'rules'  => 'required|min_length[5]|max_length[100]|is_unique[sub_category.sub_cat_title]',
                    'errors' => [
                        'required' => 'Sub Category name is required',
                        'min_length' => 'Sub Category name at least 5 character',
                        'max_length' => 'Sub Category name not greater than 100 character',
                        'is_unique' => 'Sub Category name already taken',
                    ]
                    ]
            ];
            
          if($this->validate($rules)){
              $sub_cat = new Sub_Category_Model();
              $name = $this->request->getVar('name');
              $status = $this->request->getVar('status');
            //   $image = $this->request->getFile("image");
                // if ($image->isValid() && !$image->hasMoved()) {
                //   $path = './public/uploads/sub-services/';
                //   $newName = $image->getRandomName();
                //   $image->move($path, $newName);
                  $cat->set('have_sub_cat', 1);
                  $cat->where('cat_id', $parent_id);
                  $res = $cat->update();
                     if($res){
                        //sub category added successfully
                        $data = [
                        'sub_cat_title' => $name,
                        'status'=> $status,
                        // 'sub_cat_icon' => $newName,
                        'cat_id' => $parent_id
                         ];
                         $query = $sub_cat->insert($data);
                         echo 1;
                    }
                     else
                       {
                         //error while adding sub category data
                         echo 2;
                        }
                    // }
                // else {
                //   echo 3;
                //  }
             }
           else{
                //rules not validated
               echo 0;
             }
            
            }
    }
}