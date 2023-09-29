<?php
namespace App\Models;
use CodeIgniter\Model;

class PagesModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'pid';
    protected $allowedFields = ['page_title','uid'];



    public function getPageId($pagetitle){
        return $this->where('page_title',$pagetitle)->first();
    }

    public function getCurrentPage($pageTitle){
        return $this->where('page_title',$pageTitle)->first();
    }

}