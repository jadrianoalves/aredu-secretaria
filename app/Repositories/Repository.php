<?php

namespace App\Repositories;

abstract class Repository {
    
    protected $model;

    public function __construct() {
        $this->model = $this->resolveModel();
    }
    
      
    public function all($entity) {
        
        return $this->model->where('primary_entity_id',$entity);
        
    }
    
    
    public function find($key, $value)
    {
        
        return $this->model->where($key, $value)->get();
        
    }
               
    public function get($id) {
        
        return $this->model->find($id);
    }
    
    public function store(array $data)
    {
        $this->model->create($data);
    }
            
    public function update(array $data, $id) 
    {
        $this->model->find($id)->update($data);
    }
    
    public function destroy($id)
    {
        $this->model->find($id)->delete();  
    }

    protected  function resolveModel()
    {
        return app($this->model);
    }
    
    

    
    
}
