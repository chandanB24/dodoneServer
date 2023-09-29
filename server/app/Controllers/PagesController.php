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

    public function createNewPage(){
        $inputData = $this->request->getJSON();

        $pageModel = new PagesModel();

        $pageExist = $pageModel->where('page_title',$inputData->pageTitle)->first();

        if($pageExist){
            return $this->respond(['message'=>'Page name already exists']);
        }
        else{
            $data = [
                'page_title'=>$inputData->pageTitle,
                'uid'=>$inputData->uid
            ];

            $insertData = $pageModel->insert($data);

            
        if($insertData){
           $currentrPage =  $pageModel->getCurrentPage($data['page_title']);
            return $this->respond($currentrPage);
        }
        }

    }

}