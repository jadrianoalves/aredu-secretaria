<?php

namespace App\Services;

use App\domain\ResultResponse;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassowrdMail;
use App\Repositories\PasswordResetRequestRepository;
use Illuminate\Support\Str;


class PasswordResetRequestService {

    private $model;
    
    public function __construct(PasswordResetRequestRepository $model) {
        $this->model = $model;
    }
    
    public function sendPasswordResetEmail ($email)
    {
        if($this->unsableEmail($email))
        {
            return $this->unsableEmail($email);
        }
        
        if(!$this->model->validEmail($email)) {

            return ResultResponse::create( false, 'Email does not exist.', [], 404 );
            
        } else {
            
            $this->sendMail($email);
            
            return ResultResponse::create( true, 'Check your inbox, we have sent a link to reset email.', ['email'=>$email], 200 );
            
        }
    }
    
     public function sendMail($email){
        $token = $this->generateToken($email);
        Mail::to($email)->send(new ResetPassowrdMail($token, $email));
    }
    
    
    
    public function unsableEmail($email)
    {
        if(preg_match('/^[0-9]{6}[a-z][@aredu.com.br]/',$email)==1)
       {
           return ResultResponse::create(true, 'This email not allowed update by email', $email, 200) ;
       }
       return false;
    }
    
    public function generateToken($email){
        
      $token = Str::random(80);
      $this->model->storeToken($token, $email);
      return $token;
      
    }
    
    
    
}
