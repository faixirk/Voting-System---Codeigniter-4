<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class Breadcrumb_Model extends Model{
    protected $table = 'breadcrumb';
    protected $primaryKey = 'id';
    protected $allowedFields = 
    [
        'login_image',  
        'banner',  
        'footer',  
        'created_at',  
        'admin_id',  
    
    ];
}