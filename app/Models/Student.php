<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'birthday',
        'gener',
        'filiation_1',
        'filiation_2',
        'cpf',
        'birth_certificate_number',
        'birthplace',
        'nationality',
        'user_who_modified',
        'primary_entity_id'
        
       
    ];
    
}
