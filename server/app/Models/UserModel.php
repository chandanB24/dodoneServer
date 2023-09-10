<?php
namespace App\Models;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primarykey = 'uid';
    protected $allowedFields = ['username','email','user_image'];
}