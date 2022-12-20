<?php  namespace App\Models;
use CodeIgniter\Model;

class Private_Members_Model extends Model{
    protected $table = 'private_members';
    protected $primaryKey = 'private_id';
    protected $allowedFields = [
      'first_name',
      'last_name',
      'user_email',
      'pic',
      'created_at',
      'updated_at',
      'creator_id',
      'group_id',
      'user_id',
    ];
}