<?php
namespace App\Models;
use CodeIgniter\Model;

class HeroModel extends Model
{
    protected $table = 'hero';
    protected $primaryKey = 'idhero';
    protected $allowedFields = ['idhero','pid','post_id'];

}