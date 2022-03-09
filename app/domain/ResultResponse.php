<?php

namespace App\domain;


class ResultResponse {
    
    const RESULT_TRUE = true;
    const RESULT_FALSE = false;
       
    
    
    public static function create($success, $message, $data, $status) {
        return new Result(['payload' =>[
                'success' => $success,
                'message' => $message,
                'data' => $data],
                'status_code'=>$status]);
    }
    
}

class Result{

    public $payload;
    public $success;
    public $message;
    public $data;
    public $statusCode;
    
    public function __construct($data) {
        
        $this->payload = $data['payload'];
        $this->success = $data['payload']['success'];
        $this->message = $data['payload']['message'];
        $this->data = $data['payload']['data'];
        $this->statusCode = $data['status_code'];
    
    }
    
}
