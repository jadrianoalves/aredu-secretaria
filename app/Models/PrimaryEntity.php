<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryEntity extends Model
{
    use HasFactory;
    
    public function schools()
    {
        return $this->hasMany(School::class);
    }
}
