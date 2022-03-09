<?php
namespace App\services;

use App\domain\ResultResponse;
use App\Repositories\SchoolRepository;
use App\domain\Name;


class SchoolService {

    
    private $model;
    
    public function __construct(SchoolRepository $model) {
        $this->model = $model;
    }
    
    
    public function store(array $data)
    {
     
     $hasSchool = $this->model->find('name', $data['name']);
     if (count($hasSchool)>0)
     {
         return ResultResponse::create(false,'school alrealy exists',[],400);
     }
     $currentUserEntity = auth()->user()->primary_entity_id;
     $data['primary_entity_id'] = $currentUserEntity;
     return $this->model->store($data);
        
    }
    
    public function all()
    {
        $currentUserEntity = auth()->user()->primary_entity_id;
        return $this->model->all($currentUserEntity);
    }
    
}
