<?php namespace App\Models;

use CodeIgniter\Model;

class User_Model extends Model {
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'first_name',
        'last_name',
        'username',
        'user_email',
        'country_code',
        'phone_number',
        'user_pass',
        'pic',
        'created_at'
    ];
}