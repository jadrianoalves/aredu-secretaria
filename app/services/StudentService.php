<?php

namespace App\services;

use App\Repositories\StudentRepository;


class StudentService {
    
    private $model;
    
    
    public function __construct(StudentRepository $model) {
        $this->model = $model;
    }
    
    
    public function store($data)
    {
        $data['primary_entity_id'] = auth()->user()->primary_entity_id;
        return $this->model->store($data);
    }
    
}
