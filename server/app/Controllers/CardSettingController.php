<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\CardSettingModel;


class CardSettingController extends ResourceController{

    protected $format = 'json';

    public function cardSettings(){

        $inputData = $this->request->getJSON();
        $cardSettingModel = new CardSettingModel();

        $data = [
            'pid'=>$inputData->pid,
            'post_id'=>$inputData->post_id,
            'card_pinned'=>$inputData->pinned,
            'card_highlight'=>$inputData->highlighted
        ];

        $existingCard = $cardSettingModel->where('post_id',$inputData->post_id)->first();

        if($existingCard){
            $updateData = $cardSettingModel->update($existingCard['card_id'],$data);
            if($updateData){
                return $this->respond(['message'=>'updated successfull']);
            }
        }
        else{
            $insertData = $cardSettingModel->insert($data);
            if($insertData){
                return $this->respond(['message'=>'inserted successfull']);
            }
        }

    }

    public function getSettings($pid){
        $cardSettingModel = new CardSettingModel();
        $data = $cardSettingModel->where('pid', $pid)->findAll();

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond(['message' => 'No records found for the given pid']);
        }
    }

}