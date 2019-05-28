<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use willvincent\Rateable\Rateable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable 
{
    use Notifiable;
    use Rateable;
    use HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','secondname', 'email', 'password','address','mobileno','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function product(){
        
        return $this->hasMany('App\Products');
    }

    public function verifyUser(){
        return $this->hasOne('App\VerifyUser');
    }

   
}
