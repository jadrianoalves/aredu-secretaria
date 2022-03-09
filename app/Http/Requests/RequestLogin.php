<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestLogin extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

   
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50',
            
        ];
    }
    
    public function messages() {
        return[
        'required' => 'O :attribute é obrigatório!',
        'password.min' => 'É necessário no mínimo 6 caracteres na senha!',
        'password.max' => 'É permitido no máximo 50 caracteres na senha!',
        'email.email' => 'Digite um email válido!',
        
        ];
    }
    
   
}
