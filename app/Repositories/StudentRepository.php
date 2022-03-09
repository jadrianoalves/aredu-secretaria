<?php

namespace App\Repositories;

use App\Models\Student;
use App\domain\ResultResponse;


class StudentRepository {

    public function store($data)
    {
        $result = Student::create($data);
        return $result?ResultResponse::create(true, 'Student created ', $result, 200):ResultResponse::create(false, 'occurred an error ', $result, 500);
    }
    
}
