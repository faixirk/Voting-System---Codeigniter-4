<?php namespace App\Models;

use CodeIgniter\Model;
class Votes_Results_Model extends Model {
    protected $table = 'votes_results';
    protected $primaryKey = 'vote_result_id';
    protected $allowedFields = [
        'vote_id',
        'user_id',  
        'teama_vote',  
        'teamb_vote',  
    ];
}