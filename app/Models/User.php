<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Spatie\Permission\Traits\HasRoles;
use App\domain\Name;



class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'birthdate',
        'gener',
        'cpf',
        'phone_number',
        'email',
        'password',
        'active',
        'primary_entity_id',
        'documents_folder'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTCustomClaims() {
       return []; 
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }
    
    public function schools(){
        return $this->belongsToMany(School::class, 'school_user', 'user_id', 'school_id');
    }
    
    public function getUserPrimaryEntity(User $user)
    {
        return response()->json($user->primary_entity_id);
    }
    
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = Name::create($value);
    }
    
    

}
