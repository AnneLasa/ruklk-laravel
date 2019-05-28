<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisment;

class AdvertismentController extends Controller
{
    public function index(){
        return view('advertisment.addadvertisment');
    }

    public function store(Request $request){
        
        $this->validate($request,[
            'productName'=>'required',
            'ownerName'=>'required',
            'ownerMobileno'=>'required',
            'addImage'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);

        $image =$request->file('addImage');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('./Products'),$new_name);

        $advertisment = new Advertisment;
        $advertisment->productName = $request->input('productName');
        $advertisment->ownerName = $request->input('ownerName');
        $advertisment->ownermobileno = $request->input('ownerMobileno');
        $advertisment->adimage = $new_name;
        $advertisment->status = 0;

        $advertisment->save();

        return redirect("/ads")->with('success','Product sent to admin for approval');
        
    }
}
