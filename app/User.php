<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

// implements JWTSubject
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
         'id','name','last_name','email','password','api_token'
     ];

    protected $hidden = [
         'password', 'remember_token','pivot'
    ];

    protected $casts = [
         'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
