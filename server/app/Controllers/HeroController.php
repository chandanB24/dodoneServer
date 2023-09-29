<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\HeroModel;


class HeroController extends ResourceController{

    protected $format = 'json';

    public function setHero (){

        $inputData = $this->request->getJSON();
        $heroModel = new HeroModel();

        $data = [
            'pid'=>$inputData->pid,
            'post_id'=>$inputData->post_id
        ];

        $cardExists = $heroModel->where('pid',$inputData->pid)->first();

        if($cardExists){
            $updateHero = $heroModel->update($cardExists['idhero'],$data);
            if($updateHero){
                return $this->respond(['message'=>'updated successfully']);
            }
        }
        else{
            $insertHero = $heroModel->insert($data);
            if($insertHero){
                return $this->respond(['message'=>'inserted successfull']);
            }
        }

    }

    public function getHero($pid){
        $heroModel = new HeroModel();
        $data = $heroModel->where('pid', $pid)->findAll();

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond(['message' => 'No records found for the given pid']);
        }
    }

}