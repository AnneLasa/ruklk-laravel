<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class PageController extends Controller
{
    public function index(){
        $event = Event::where('status','=',1)->get();
        return view('Home')->with('event',$event);
    }
}
