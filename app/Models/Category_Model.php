<?php namespace App\Models;

use CodeIgniter\Model;

class Category_Model extends Model{
    protected $table = 'category';
    protected $primaryKey = 'cat_id';
    protected $returnType = 'array';
    protected $allowedFields = [
      'cat_title',
      'cat_status',
      'cat_icon',
      'have_sub_cat',
      'admin_id'
    ];
}