<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\RequestLogin;
use App\services\AuthService;


class AuthController extends Controller
{
    private $model;
    
    public function __construct(AuthService $model) {
        $this->model = $model;
    }
 
    public function authenticate(RequestLogin $request)
    {
        $credentials = $request->only('email', 'password');
        $request->validated();
        $result = $this->model->authenticate($credentials);
               
        return Response()->json($result->payload,$result->statusCode);
        
    }
    
    public function logout(Request $request)
    {
        $token = $request->token;        
        $request->validated();
        return $this->model->logout($token);
    }
 
   public function getCurrentUser(Request $request)
    {
        $token = $request->token;
        return $this->model->getCurrentUser($token);
    }
    
    
}