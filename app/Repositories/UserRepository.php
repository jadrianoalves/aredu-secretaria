<?php

namespace App\repositories;

use \App\Repositories\Repository;
use App\domain\ResultResponse;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\School;


class UserRepository extends Repository{
   
    
    protected $model = User::class;
    
    
    
    public function store($data)
    {               
        $user = $this->user = User::create($data)->assignRole($data['role']);
        return $user?ResultResponse::create(true,'User Created success',$user,200):ResultResponse::create(false,'Ocurren an error',[],400);
        
    }
    
    public function where($key, $value)
    {
        return User::where($key, $value)->first();
    }

    public function attachSchool($data)
    {
        $user = User::find(auth()->user()->id);
        $user->schools()->attach($data);
        return $user?ResultResponse::create(true,'School attached success',$user,200):ResultResponse::create(false,'Ocurren an error',[],400);;
        
    }
    
    public function detachSchool($data)
    {
        $user = User::find(auth()->user()->id);
        $user->schools()->detach($data);
        return $user?ResultResponse::create(true,'School detached success',$user,200):ResultResponse::create(false,'Ocurren an error',[],400);
        
    }
    
    
    public function getCurrentUserSchools()
    {
        $result = DB::table('school_user')->where('user_id',auth()->user()->id)->select('school_id')->get();
        $schools = array();
        
        foreach ($result as $school)
        
        {
           array_push($schools, $school->school_id);
        }
        
        $allSchools = School::find($schools);
        return $allSchools;
    }
    
    public function currentUserHasSchool($id)
    {
        $result = DB::table('school_user')->where('user_id',auth()->user()->id)->where('school_id',$id)->first();
        return isset($result);
    }
    
    public function blockUser($user, $option)
    {
        $user = User::find($user);
        if($user)
        {
            $user->active = $option;
            $user->save();
        }
        
        return $user?ResultResponse::create(true,'Activation status change success',$user,200):ResultResponse::create(false,'User not exists',[],400); 
    }
    
    
    
    
    
}
