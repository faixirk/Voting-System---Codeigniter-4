<?php namespace App\Models;

use CodeIgniter\Model;

class Groups_Model extends Model{
    protected $table = 'groups';
    protected $primaryKey = 'group_id';
    protected $allowedFields = [
     'group_name',
    //  'group_description',
     'has_joined',
     'cat_id',
     'sub_cat_id',
     'user_id'
    ]; 
}