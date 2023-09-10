<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PagesModel;


class PagesController extends ResourceController{

    protected $format = 'json';

    public function getData($uid){

        $pageModel = new PagesModel();

        $data = $pageModel->where('uid', $uid)->findAll();

        if($data){
        return $this->respond($data);
        }
        else{
            return $this->respond(['message'=>'Error in fetching the data']);
        }
    }


}