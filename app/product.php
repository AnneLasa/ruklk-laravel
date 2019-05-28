<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function user(){
        return $this->belongsTo('App\User'); 
    }
    public function ordertype(){
        return $this->hasMany('App\Order'); 
    }
    public function favtype(){
        return $this->hasMany('App\Favourit'); 
    }
}

