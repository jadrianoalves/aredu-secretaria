<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\domain\Name;

class School extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'address_place',
        'address_number',
        'address_zipcode',
        'address_district',
        'address_city',
        'number_of_rooms',
        'primary_entity_id'
    ];
    
    public function primaryEntity()
    {
        return $this->belongsTo(PrimaryEntity::class);  
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'school_user', 'school_id', 'user_id');
    }
    
      public function setNameAttribute($value)
    {
        $this->attributes['name'] = Name::create($value);
    }
    
                
    
}
