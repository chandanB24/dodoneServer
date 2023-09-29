<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['username','email','user_image'];


    public function getCurrentUserData($email){
        return $this->where('email',$email)->first();
    }



}