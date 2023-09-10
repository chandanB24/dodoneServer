<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PostModel;
use App\Models\PagesModel;


class EndUserController extends ResourceController{
    
    
    protected $format = 'json';
    
    public function getUserPage($pagetitle){
        $postModel = new PostModel();
        $posts = $postModel->getPostByTitle($pagetitle);

        if(empty($posts)){
            return $this->respond(['message'=>'Page Not Found']);
        }

        return $this->respond($posts);

    }
}
