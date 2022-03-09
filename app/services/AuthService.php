<?php

namespace App\services;


use JWTAuth;
use App\domain\ResultResponse;
use App\Models\User;

class AuthService {

    public function getCurrentUser($token)
    {
        return JWTAuth::toUser($token);
    }
    
    public function authenticate($data)
    {
        
        try {

            if (! $token = JWTAuth::attempt($data)) {
                return ResultResponse::create(false, 'Login credentials are invalid.', [], 400);
            }

        } catch (JWTException $e) {

            return ResultResponse::create(false, 'Could not create token.', [], 400);

        }
 	
        
        if(auth()->user()->active==0)
        {
            return ResultResponse::create(false, 'User is blocked', [], 200);
        }
                
        return ResultResponse::create(true, 'You are logged.', ['token'=>$token], 200);                

    }
    
       
    public function logout($token)
    {
        
        try {

            JWTAuth::invalidate($token);
            return ResultResponse::create(true, 'User has been logged out', [], 200);
            
        } catch (JWTException $exception) {
            
            return ResultResponse::create(false, 'Sorry, user cannot be logged out', [], 500);
            
        }
        
    }
    
    
    
    
    
    
    
}
