<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProfileModel;


class ProfileController extends ResourceController{

    protected $format = 'json';
    
    public function createProfile(){
       
        $profileModel = new ProfileModel();

        $file = $this->request->getFile('image');
        $imageName = $file->getRandomName();
        $file->move(ROOTPATH . 'public/uploads', $imageName);

        $data = [
            'profile_info'=> $this->request->getPost('info'),
            'profile_image'=> 'public/uploads/' . $imageName,
            'profile_url'=> $this->request->getPost('url'),
            'profile_yturl'=> $this->request->getPost('yturl'),
            'profile_insta'=> $this->request->getPost('instaurl'),
            'profile_fburl'=> $this->request->getPost('fburl'),
            'pid'=> $this->request->getPost('pid'),

        ];
        
        $insertData = $profileModel->insert($data);

        if($insertData){
            return $this->respond(['message' => 'profile uploaded successfully']);
        }
        else{
            return $this->respond(['error' => 'error in uploading']);
        }

    }

    public function getProfile ($id) {
        $profileModel = new ProfileModel();

        $getData = $profileModel->where('pid',$id)->first();
        if($getData){
            return $this->response->setJSON($getData);
        }
        return $this->respond(['error'=>'error in fetching the data']);

    }


}