<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\ProfileModel;
use App\Models\PagesModel;


class ProfileController extends ResourceController{

    protected $format = 'json';
    
    // public function createProfile(){
       
    //     $profileModel = new ProfileModel();

    //     $file = $this->request->getFile('image');
    //     $imageName = $file->getRandomName();
    //     $file->move(ROOTPATH . 'public/uploads', $imageName);

    //     $data = [
    //         'profile_info'=> $this->request->getPost('info'),
    //         'profile_image'=> 'uploads/' . $imageName,
    //         'profile_url'=> $this->request->getPost('url'),
    //         'profile_yturl'=> $this->request->getPost('yturl'),
    //         'profile_insta'=> $this->request->getPost('instaurl'),
    //         'profile_fburl'=> $this->request->getPost('fburl'),
    //         'pid'=> $this->request->getPost('pid'),

    //     ];
        
    //     $insertData = $profileModel->insert($data);

    //     if($insertData){
    //         return $this->respond(['message' => 'profile uploaded successfully']);
    //     }
    //     else{
    //         return $this->respond(['error' => 'error in uploading']);
    //     }

    // }


    public function createProfile() {
        $profileModel = new ProfileModel();
    
        $pid = $this->request->getPost('pid');
    
        // Check if the profile with the given pid exists
        $existingProfile = $profileModel->where('pid', $pid)->first();
    
        if ($existingProfile) {
            // If the profile exists, update the data
            $file = $this->request->getFile('image');
            $imageName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $imageName);
    
            $data = [
                'profile_info' => $this->request->getPost('info'),
                'profile_image' => 'uploads/' . $imageName,
                'profile_url' => $this->request->getPost('url'),
                'profile_yturl' => $this->request->getPost('yturl'),
                'profile_insta' => $this->request->getPost('instaurl'),
                'profile_fburl' => $this->request->getPost('fburl'),
            ];
    
            // Update the existing profile
            $updateData = $profileModel->update($existingProfile['profile_id'], $data);
    
            if ($updateData) {
                return $this->respond(['message' => 'Profile updated successfully']);
            } else {
                return $this->respond(['error' => 'Error in updating profile']);
            }
        } else {
            // If the profile doesn't exist, insert new data
            $file = $this->request->getFile('image');
            $imageName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $imageName);
    
            $data = [
                'profile_info' => $this->request->getPost('info'),
                'profile_image' => 'uploads/' . $imageName,
                'profile_url' => $this->request->getPost('url'),
                'profile_yturl' => $this->request->getPost('yturl'),
                'profile_insta' => $this->request->getPost('instaurl'),
                'profile_fburl' => $this->request->getPost('fburl'),
                'pid' => $pid,
            ];
    
            // Insert new profile data
            $insertData = $profileModel->insert($data);
    
            if ($insertData) {
                return $this->respond(['message' => 'Profile uploaded successfully']);
            } else {
                return $this->respond(['error' => 'Error in uploading profile']);
            }
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

    public function getPageTitle($id){
        $pagesModel = new PagesModel();

        $pageTitle = $pagesModel->where('pid',$id)->first();
        
        if($pageTitle){
            return $this->respond($pageTitle);
        }

        else{
            return $this->respond(['error'=>'error in fetching']);
        }


    }



}