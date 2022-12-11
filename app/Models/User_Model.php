<?php namespace App\Models;

use CodeIgniter\Model;
class User_Model extends Model {
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $allowedFields = [
        'first_name',
        'last_name', 
        'user_email', 
        'user_pass',
        'pic',
        'status',
        'code',
        'activation_date',
        'created_at',
        'updated_at'
    ];

    public function verifyEmail($email){
       
        $builder = $this->db->table('user');
        $builder->select("code,status,first_name,user_pass");
        $builder->where('user_email',$email);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }
    public function updatedAt($id){
        $builder = $this->db->table('user');
        $builder->where('code', $id);
        $builder->update(['updated_at'=>date('Y-m-d h:i:s')]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function verifyUniid($id)
    {
         $builder = $this->db->table('user');
         $builder->select('activation_date, code, status');
         $builder->where('code',$id);
         $result = $builder->get();
         
         if(count($result->getResultArray())==1)
         {
            return $result->getRow();
         }
         else
         {
             return false;
         }
    }
    public function updateStaus($uniid)
    {
        $builder = $this->db->table('user');
        $builder->where('code',$uniid);
        $builder->update(['status'=>'active']);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function verifyToken($token){
        $builder = $this->db->table('user');
        $builder->select("code,first_name,updated_at");
        $builder->where('code',$token);
        $result = $builder->get();
        if(count($result->getResultArray())==1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }
    public function updatePassword($id,$pwd){
        $builder = $this->db->table('user');
        $builder->where('code', $id);
        $builder->update(['user_pass'=>$pwd]);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    
}