<?php
namespace App\Models;
use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'pages';
    protected $primarykey = 'pid';
    protected $allowedFields = ['page_title','page_description','uid'];



    public function getPageId($pagetitle){
        return $this->where('page_title',$pagetitle)->first();
    }



}