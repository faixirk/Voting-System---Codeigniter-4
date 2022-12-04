<?php namespace App\Models;
  
use CodeIgniter\Model;
  
class Logos_Model extends Model{
    protected $table = 'logos';
    protected $primaryKey = 'logo_id';
    protected $allowedFields = 
    [
        'header_logo',  
        'admin_panel_logo',  
        'favicon',  
        'created_at',  
        'admin_id',  
    
    ];
}