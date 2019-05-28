<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index(){
        return view('event.event');
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'eventName'=>'required',
            'eventOwnerName'=>'required',
            'ownerMobileno'=>'required',
            'startdate' => 'required',
            'addImage'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

        $image =$request->file('addImage');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('./Events'),$new_name);

        $event = new Event;
        $event->eventName = $request->input('eventName');
        $event->eventOwnerName = $request->input('eventOwnerName');
        $event->ownermobileno = $request->input('ownerMobileno');
        $event->startdate = $request->input('startdate');
        $event->adimage = $new_name;
        $event->status = 0;

        $event->save();

        return redirect("/event")->with('success','Product sent to admin for approval');
        
    }
}
