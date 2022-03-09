<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestRegister;
use App\services\UserService;
use Spatie\Permission\Exceptions\UnauthorizedException;

class UserController extends Controller
{
    private $model;
    
    public function __construct(UserService $model) {
        $this->model = $model;
        $this->middleware(['role:administrator'],['only' => ['createAdmin','createMananger']]); 
        $this->middleware(['role:mananger'],['except' => ['createAdmin']]);
        $this->middleware(['role:secretary'],['except' => ['createAdmin', 'createManger', 'createHardMaster', 'createSecretary' ]]);
        $this->middleware(['role:headmaster'],['except' => ['createAdmin', 'createManger', 'createHardMaster', 'createSecretary' ]]);
    }
    
    private function register(RequestRegister $request, $role)
    {
        $request->validated();
        
                $result = $this->model->create([
                'name' => $request->name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password),
                'birthday' =>$request->birthday,
                'gener' =>$request->gener,
                'cpf'=>$request->cpf,
                'phone_number'=> $request->phone_number,
                'active'=> 1,
                'role' => $role,

                ]);
              try{
                  return Response()->json($result->payload,$result->statusCode);
              }catch(UnauthorizedException $e)
              {
                  return Response()->json('erro');
              }  
        
        
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
        return $this->register($request, 'administrator');
    }
    
    public function createMananger(RequestRegister $request)
    {
        return $this->register($request,  'mananger');
    }
    
    public function createHeadMaster(RequestRegister $request)
    {
        return $this->register($request, 'headmaster');
    }
    
    public function createSupervisor(RequestRegister $request)
    {
        return $this->register($request, 'supervisor');
    }
    
    public function createSecretary(RequestRegister $request)
    {
        return $this->register($request, 'secretary');
    }
    
    public function createTeacher(RequestRegister $request)
    {
        return $this->register($request, 'teacher');
    }
    
    public function createAccountable(RequestRegister $request)
    {
        return $this->register($request, 'acontable');
    }
    
    public function createStudent(RequestRegister $request)
    {
        return $this->register($request, 'student');
    }
    
    
    
    
}
