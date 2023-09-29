<?php
namespace App\Models;
use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'profile_id';
    protected $allowedFields = ['profile_info','profile_image','profile_url','profile_yturl','profile_insta','profile_fburl','pid'];

}