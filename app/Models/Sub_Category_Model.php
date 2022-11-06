<?php namespace App\Models;

use CodeIgniter\Model;

class Sub_Category_Model extends Model{
    protected $table = 'sub_category';
    protected $primaryKey = 'sub_cat_id';
    protected $returnType = 'array';
    protected $allowedFields = [
        'sub_cat_title',
        'status',
        'sub_cat_icon',
        'created_at',
        'cat_id'
    ];
}