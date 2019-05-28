<?php

namespace App\Http\Controllers;

use App\Post;
use App\category;


class blogController extends Controller{

    public function getIndex() {
        $categories = category::all();
        $posts= Post::orderBy('created_at','desc')->limit(4)->get();
        return view('pages.welcome',compact('posts','categories'));
  }
    public function getabout(){
        $first = 'ishani';
        $last = 'Wijaya';

        $fullname = $first . "" . $last;
        $email = 'ishani.wijaya@gmail.com';
        $data = [];
        $data['email']= $email;
        $data['fullname']=$fullname;
        return view('pages.about')->withData($data);
        
    }
    public function getcontact(){
        return view('pages.contact');;
        
    }

public function getimagegallery(){
        return view('pages.imagegallery');;
        
    }
    
}
