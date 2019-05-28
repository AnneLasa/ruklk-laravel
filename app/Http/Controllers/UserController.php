<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\product;
use App\Favourite;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use willvincent\Rateable\Rating;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus=200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fav = Favourite::where('BuyerId', $id)->where('status','=',0)->get();
        
        
        return view('profile.Dashboard')->with('fav',$fav);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('profile.EditProfile')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

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

        return redirect("/user/$id/edit")->with('success','Saved Changes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editprofile($id)
    {
        
    }

    public function ratesellers(Request $request, $pId){

        request()->validate(['rate' => 'required']);
        $user1 = User::first();

        $user = User::find($request->id);
        $rating = new Rating();
        $rating->rating = $request->rate;
        $rating->user_id = auth()->user()->id;

        $user->ratings()->save($rating);
        return  redirect('/products/searchproduct/'.$pId);

    }

    public function vieworders(){
        $orders = Order::where('status','=',0)->get();
        return view('profile.Orders')->with('orders', $orders);
    }

    public function approveorder($id, $orderId)
    {
        $orders = \DB::table('orders')->where('id',$orderId)->update(['status'=>1]);
        return redirect('user/'.$id.'/vieworders');
    }

    public function removefav($id, $productId)
    {
        $orders = \DB::table('favourites')->where('productId',$productId)->update(['status'=>1]);
        return redirect('user/'.$id);
    }

    public function showprofilechat(){
        return view('chat.profilechat');
    }


    public function searchorganization(){
        $search = Input::get('search');
        if($search == ''){
            $users = User::where('type','=','organization')->paginate(5);
             return view('search.searchorganization')->with('users',$users);
        }else{
            $users = User::where([['firstname','LIKE','%'.$search.'%'],['type','=','organization']])->paginate(5);
            return view('search.searchorganization')->with('users',$users);
        }
        
    }

    //Mobile api controllers
    

    public function getdata(){
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus);
    }

    
}
