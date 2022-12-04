<?php namespace App\Models;

use CodeIgniter\Model;


class Social_Links_Model extends Model{
    protected $table = 'social_links';
    protected $primaryKey = 'id';
    protected $allowedFields = [
       'name',
       'icon',
       'link',
       'admin_id',
    ];

}