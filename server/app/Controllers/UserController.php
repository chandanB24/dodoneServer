<?php

namespace App\Controllers;
use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;


class UserController extends ResourceController{


    protected $format = 'json';

    public function create () {


        $inputData = $this->request->getJSON();


        $userModel = new UserModel();

        $userExist = $userModel->where('email',$inputData->email)->first();

        if($userExist){
            return $this->respond($userExist);
        }

        else{
            $data = [
                        'username'=> $inputData->name,
                        'email'=> $inputData->email,   
                        'user_image'=> $inputData->imageURL,
                    ];

                $insertData = $userModel->insert($data);
                
                if($insertData){
                    $getCurrentUser = $userModel->getCurrentUserData($data['email']);
                    return $this->respond($getCurrentUser);
                }             
            
        }


    }



}