<?php namespace App\Models;

use CodeIgniter\Model;
class User_Model extends Model {
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'first_name',
        'last_name', 
        'user_email', 
        'user_pass',
        'pic',
        'created_at'
    ];
}