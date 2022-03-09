<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\services\StudentService;

class StudentController extends Controller
{
 
    private $model;
    
    public function __construct(StudentService $model) {
        $this->model = $model;
    }
    
    
    public function index()
    {
        return 'students page';
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
        $data = [
                'name' => $request->name,
                'birthday'=> $request->birthday,
                'gener'=> $request->gener,
                'filiation_1' => $request->filiation_1,
                'filiation_2' => $request->filiation_2,
                'cpf'=> $request->cpf,
                'birth_certificate_number' => $request->birth_certificate_number,
                'birthplace'=> $request->birthplace,
                'nationality'=> $request->nationality,
                ];
        
        $result = $this->model->store($data);
        return Response()->json($result->payload,$result->statusCode);
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
