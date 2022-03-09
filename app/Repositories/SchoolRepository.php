<?php


namespace App\Repositories;

use App\Models\School;
use App\domain\ResultResponse;

class SchoolRepository extends Repository {

    public function store(array $data)
    {
        $school = School::create($data);
        return $school?ResultResponse::create(true,'School Created success',$school,200):ResultResponse::create(false,'Ocurren an error',[],400);
            
    }
    
    public function all($entity)
    {
        $schools = School::where('primary_entity_id',$entity)->get();
        return $schools?ResultResponse::create(true,'Schools listed success',$schools,200):ResultResponse::create(false,'No where Schools to list',[],200);
    }
    
    
    public function get($value)
    {
        
        return School::find($value);
        
    }    
    
 
    
    public function find($key, $value)
    {
        
        return School::where($key, $value)->get();
        
    }
    
}
