<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
use App\services\UserService;

class UserController extends Controller
{
    private $model;
    
    public function __construct(UserService $model) {
        $this->model = $model;
        $this->middleware(['role:admin'])->only('create');
    }
    
    private function register(RequestRegister $request)
    {
        $request->validated();
        
                $result = $this->model->create([
                'name' => $request->name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password),
                'role'=>$request->role,
                'active' => 1,
                'id'=>$request->id
                ]);
                
        return Response()->json($result->payload,$result->statusCode);
        
    }
    
    public function attachSchool(Request $request)
    {
        $result =  $this->model->attachSchool($request->school_id);
        return Response()->json($result->payload,$result->statusCode);
    }
    
    public function detachSchool(Request $request)
    {
        $result =  $this->model->detachSchool($request->school_id);
        return Response()->json($result->payload,$result->statusCode);
    }
    
    public function getSchools()
    {
       $result = $this->model->getSchools();
       return Response()->json($result->payload,$result->statusCode);
    }
    
    public function createAdmin(RequestRegister $request)
    {
        $request->role = 'administrator';
        return $this->register($request);
    }
    
    public function createMananger(RequestRegister $request)
    {
        $request->role = 'mananger';
        return $this->register($request);
    }
    
    public function createHeadMaster(RequestRegister $request)
    {
        $request->role = 'headmaster';
        return $this->register($request);
    }
    
    public function createSupervisor(RequestRegister $request)
    {
        $request->role = 'supervisor';
        return $this->register($request);
    }
    
    public function createSecretary(RequestRegister $request)
    {
        $request->role = 'supervisor';
        return $this->register($request);
    }
    
    public function createTeacher(RequestRegister $request)
    {
        $request->role = 'teacher';
        return $this->register($request);
    }
    
    public function createAccountable(RequestRegister $request)
    {
        $request->role = 'acontable';
        return $this->register($request);
    }
    
    public function createStudent(RequestRegister $request)
    {
        $request->role = 'student';
        return $this->register($request);
    }
    
}
