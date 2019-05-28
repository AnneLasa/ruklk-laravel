<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    public function productType(){
        return $this->belongsTo('App\Product', 'productId'); 
    }
}
