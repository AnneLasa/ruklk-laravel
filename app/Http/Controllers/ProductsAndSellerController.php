<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\product;
use DB;

class ProductsAndSellerController extends Controller
{
    public function buyproducts(){
        return view('search.search');
    }

  
}
