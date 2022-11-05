<?php namespace App\Models;

use CodeIgniter\Model;


class Admin_Model extends Model{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $allowedFields = [
       'admin_name',
       'admin_email',
       'admin_pass',
       'admin_pic',
       'created_at'
    ];

}