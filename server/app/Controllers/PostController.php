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


    public function createPost (){
       
       $inputData = $this->request->getJSON();
        $postModel = new PostModel();

        $data = [
            'pid'=>$inputData->pid,
            'post_title'=>$inputData->postTitle,
            'post_body'=>$inputData->postBody,
            'post_url'=>$inputData->postUrl,
            'yt_url'=>$inputData->ytUrl,
            'post_timestamp'=>$inputData->timeStamp,
            'image_url'=>$inputData->imageUrl
        ];

        $insertData = $postModel->insert($data);
        
        if($insertData){
            return $this->respond(['message'=>'Post Created Successfully']);
        }

    }

    public function getHeroPost($postid){
        $postModel = new PostModel();
        $data = $postModel->where('post_id',$postid)->first();

        if($data){
            return $this->respond($data);
        }
        else{
            return $this->respond(['message'=>'not found']);
        }
    }

    public function deletePost($id){
        $postModel = new PostModel();
        
        $deletePost = $postModel->where('post_id', $id)->delete();

        if($deletePost){
            return $this->respond(['message'=>'post deleted successfully']);
        }
        else{
            return $this->respond(['error'=>'error in deleting']);
        }

    }


}