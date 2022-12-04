<?php namespace App\Models;

use CodeIgniter\Model;

class Contact_Us_Model extends Model{
    protected $table = 'contact';
    protected $primaryKey = 'contact_id';
    protected $allowedFields = [
     'heading',
     'sub_heading',
     'short_description',
     'address',
     'house',
     'email',
     'phone',
     'footer_short_details',
     'admin_id'
    ]; 
}