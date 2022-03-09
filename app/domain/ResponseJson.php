<?php

namespace App\domain;


class ResponseJson {
    
    const RESULT_TRUE = true;
    const RESULT_FALSE = false;
       
    
    
    public static function create($success, $message, $data, $status) {
        return Response()->json([
                'success' => $success,
                'message' => $message,
                'data' => $data
               ],$status);
    }
    
}
