<?php

namespace App\Models;

use CodeIgniter\Model;

class Public_Chat_Model extends Model
{
	protected $table                = 'public_chat';
	protected $primaryKey           = 'id';

	protected $allowedFields        = ['username', 'message', 'created_at'];

}
