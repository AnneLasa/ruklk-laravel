<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\product;
use App\Advertisment;
use App\Event;
use Illuminate\Support\Facades\Auth;
use Hash;

class AdminController extends Controller
{
    public function __construct(){
        
        
    }

    public function vieweditadmin($id){
        $user = User::find($id);
        return view('admin.admin')->with('user',$user);
    }

    public function updateadmin(Request $request ,$id){
        
        $this->validate($request,[
            'firstname' => 'required|string|max:255',
            'secondname' => 'required|string|max:255',
            
            'email' => 'required',
            'password' => 'required|string|min:6',
            'address' => 'required|string|max:255',
            'mobileno' => 'required|string|max:255',
            
        ]);

        $user = User::find($id);
        $user->firstname = $request->input('firstname');
        $user->secondname = $request->input('secondname');
        $user->email = $request->input('email');
        $user->password =Hash::make($request->input('password'));
        $user->address = $request->input('address');
        $user->mobileno = $request->input('mobileno');
        $user->save(); 

        return redirect('/admin/'.$id)->with('success','Saved Changes');
        
    }

    public function approve($id){
        $product = Product::where('approval','=', 0)->paginate(5);
        return view('admin.aproveproduct')->with('product', $product);
    }

    public function approveproduct($id,$productid){
       $product = \DB::table('products')->where('id',$productid)->update(['approval'=>1]);     
       return redirect('/admin/'.$id.'/approve');
    }

    public function rejectproduct($id,$productid){
        $productDelete = \DB::table('products')->where('id',$productid)->delete();
        return redirect('/admin/'.$id.'/approve');
    }

    public function approveads($id){
        
        $ads = Advertisment::where('status','=', 0)->paginate(5);
        return view('admin.aproveads')->with('ads', $ads);
    }

    public function approvedadvertisment($id,$adid){
        $ads = \DB::table('advertisments')->where('id',$adid)->update(['status'=>1]);     
        return redirect('/admin/'.$id.'/approveads');
     }

     public function rejectadvertisment($id,$adid){
        $ads = \DB::table('advertisments')->where('id',$adid)->update(['status'=>3]);     
        return redirect('/admin/'.$id.'/approveads');
     }

     public function showevents(){
        $event = Event::where('status','=', 0)->paginate(5);
        return view('admin.showevent')->with('event', $event);
     }
      public function approveevent($id, $eventid){
        $event = \DB::table('events')->where('id',$eventid)->update(['status'=>1]);     
        return redirect('/admin/'.$id.'/showevents');
      }

      public function showusers(){
        $users = User::paginate(5);
        return view('admin.showusers')->with('users', $users);
     }
    
     public function banneduser ($id, $userid){
        $ads = \DB::table('users')->where('id',$userid)->update(['verified'=>2]);
        return redirect('/admin/'.$id.'/showusers'); 
     }

}
