<?php

namespace App\services;

use \App\Repositories\UserRepository;
use App\domain\ResultResponse;
use App\services\AuthService;
use App\Repositories\SchoolRepository;
use App\domain\EmailFactory;
use App\domain\UserFolderFactory;



class UserService {
    
    
    private $model;
    private $auth;
    private $school;
    
    
    public function __construct(UserRepository $model, AuthService $auth, SchoolRepository $school) {
        $this->model = $model;
        $this->auth = $auth;
        $this->school = $school;
    }
    
        
    public function create($data)
    {
        
        if($data['email']=='')
            {
                $data['email'] = EmailFactory::create($data['id'], $data['name']);
            }
              
            $user = $this->model::where('email',$data['email']);
            
            if($user){
               return ResultResponse::create(false,'user alrealy existis',$user,400);
            }
            $currentEnttity = auth()->user()->primary_entity_id;
            $data['primary_entity_id'] = $currentEnttity;
            $data['documents_folder'] = $this->folderNameFactory();
            UserFolderFactory::create($data['documents_folder']);
            $result = $this->model->store($data);
            return $result;
        
    }
    
    
    private function folderNameFactory()
    {
        return md5(now()->getTimestamp());
    }
    
    public function attachSchool($data)
    {
        $school = $this->school->get($data);
        if(!$school)
        {
           return ResultResponse::create(false,'School not existis',[],400);
        }
        $hasSchool = $this->model->currentUserHasSchool($data);
        if ($hasSchool)
        {
          return ResultResponse::create(false,'School alrealy existis for this user',[],400);
        }
        $result = $this->model->attachSchool($data);
        return $result;
        
    }
    
    public function detachSchool($data)
    {
        $school = $this->school->get($data);
        if(!$school)
        {
           return ResultResponse::create(false,'School not existis',[],400);
        }
        $hasSchool = $this->model->currentUserHasSchool($data);
        if (!$hasSchool)
        {
          return ResultResponse::create(false,'School not existis for this user',[],400);
        }
        $result = $this->model->detachSchool($data);
        return $result;
        
    }
    
    public function getSchools()
    {
        $schools = $this->model->getCurrentUserSchools();
        return ResultResponse::create(true,'All schools for this user',$schools,200);
    }
    
    public function blockUser($user, $option)
    {
        return $this->model->blockUser($user, $option);
    }
    
    
    
       
}
