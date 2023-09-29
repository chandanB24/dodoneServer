<?php
namespace App\Models;
use CodeIgniter\Model;
use App\Models\PagesModel;

class PostModel extends Model
{
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $allowedFields = ['pid','post_title','post_body','post_url','yt_url','post_timestamp','image_url'];

    public function getPostByTitle($pageTitle){
        $pageModel = new PagesModel();
        $page = $pageModel->getPageId($pageTitle);


        if(!$page){
            return ['message' => 'no page found'];
        }

        return $this->where('pid',$page['pid'])->findAll();
    }


}