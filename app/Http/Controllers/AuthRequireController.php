<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\User;

class AuthRequireController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewPersonalChat($productId, $id){
        $item = Product::find($productId);;
        $seller = User::find($item->sellerId);
        
        return view('search.personalchat')->with('item',$item)->with('seller',$seller);
    }
}
