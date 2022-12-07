<?php namespace App\Models;

use CodeIgniter\Model;
class Votes_Model extends Model {
    protected $table = 'votes';
    protected $primaryKey = 'vote_id';
    protected $allowedFields = [
        'team_a',
        'team_b',  
        'category_id',
        'subCategory_id',
        'banner1',
        'banner2',
        'description',
        'type',
        'teama_votes',
        'teamb_votes',
        'user_id',
        'status'
    ];
}