<?php namespace App\Models;

use CodeIgniter\Model;

class About_Us_Model extends Model{
    protected $table = 'about';
    protected $primaryKey = 'id';
    protected $allowedFields = [
     'title',
     'sub_title',
     'description',
     'image',
     'admin_id'
    ]; 
}