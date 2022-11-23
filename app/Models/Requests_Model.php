<?php namespace App\Models;
use CodeIgniter\Model;

class Requests_Model extends Model{

    protected $table = "requests";
    protected $primaryKey = "request_id";
    protected $allowedFields = [
        'group_id',
        'creator_id',
        'status',
        'has_joined',
        'user_id',

    ];

}
