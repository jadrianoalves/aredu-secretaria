<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use \App\Services\PasswordResetRequestService;

class PasswordResetRequestController extends Controller {
  
    private $model;
    
    public function __construct(PasswordResetRequestService $model) {
        $this->model = $model;
    }
    
    public function sendPasswordResetEmail(Request $request){
        
        $result = $this->model->sendPasswordResetEmail($request->email);
        
        return Response()->json($result->payload,$result->statusCode);
       
    }

}