<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRegister extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
           'name' => 'required',
           'password' => 'required|string|min:6|max:50',
        ];
    }
    
    public function messages() {
        return [
            'email.email' => 'Digite um email válido!',
            'password.confirmed' => 'Confirme o email'
        ];
    }
}
