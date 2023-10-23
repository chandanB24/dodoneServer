<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\PageSettingModel;


class PageSettingController extends ResourceController{

    public function createPageSetting(){

       $inputData = $this->request->getJSON();
       $pageSettingModel = new PageSettingModel();

       $data = [
        'pid'=>$inputData->pid,
        'cards_per_row'=>$inputData->cardsPerRow,
        'hero'=>$inputData->hero,
        'profile'=>$inputData->profile,
        'flat_card'=>$inputData->flatCard,
        'time_stamp'=>$inputData->timeStamp
       ];

       $existPage = $pageSettingModel->where('pid',$inputData->pid)->first();

       if($existPage){
        $updateData = $pageSettingModel->update($existPage['idpage_settings'],$data);
        if($updateData){
            return $this->respond(['message'=>'updated successfull']);
        }
       }
       else{
        $insertData = $pageSettingModel->insert($data);
        if($insertData){
            return $this->respond(['message'=>'inserted successfull']);
        }
       }

    }

    public function getPageSettings ($id){
        $pageSettingModel = new PageSettingModel();

        $getSetting = $pageSettingModel->where('pid',$id)->first();

        if($getSetting){
            return $this->respond($getSetting);
        }
        else{
            return $this->respond(['error'=>'page not found']);
        }
    }

    
}