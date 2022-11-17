<?php namespace App\Models;

use CodeIgniter\Model;
class Votes_Model extends Model {
    protected $table = 'votes';
    protected $primaryKey = 'vote_id';
    protected $allowedFields = [
        'team_a',
        'team_b', 
        'team_a_banner', 
        'team_b_banner', 
        'category_id',
        'subCategory_id',
        'description',
        'type',
    ];
}