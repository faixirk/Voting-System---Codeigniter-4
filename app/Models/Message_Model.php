<?php

namespace App\Models;

use CodeIgniter\Model;

class Message_Model extends Model
{
	protected $table                = 'message';
	protected $primaryKey           = 'id';

	protected $allowedFields        = ['username', 'message','group_id','user_id', 'created_at'];

}
