<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use App\services\SchoolService;
use Illuminate\Http\Response;

class SchoolController extends Controller
{
    
    private $model;
    
    public function __construct(SchoolService $model) {
        
        $this->model = $model;
        
    }
   
    public function index(Request $request)
    {
      
        $result = $this->model->all();
        return Response()->json($result->payload,$result->statusCode);
              
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $result = $this->model->store([
            'name' =>$request->name,
            'address_place' =>$request->address_place,
            'address_number' =>$request->address_number,
            'address_zipcode' =>$request->address_zipcode,
            'address_city' =>$request->address_city,
            'number_of_rooms' =>$request->number_of_rooms,
            ]);
        return Response()->json($result->payload,$result->statusCode);
    }
    
    public function show(School $school)
    {
        //
    }

    public function edit(School $school)
    {
        //
    }

     public function update(Request $request, School $school)
    {
        //
    }

     public function destroy(School $school)
    {
        //
    }
}
