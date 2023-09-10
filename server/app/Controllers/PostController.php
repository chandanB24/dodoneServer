<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PostModel;


class PostController extends ResourceController{

    protected $format = 'json';

    public function getPosts($pid){
        
        $postModel = new PostModel();

        $data = $postModel->where('pid',$pid)->findAll();

        if($data){
            return $this->respond($data);
        }
        else{
            return $this->respond(['message'=>'No data is available']);
        }

    }


}