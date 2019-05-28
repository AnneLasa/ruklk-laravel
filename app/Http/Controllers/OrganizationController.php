<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;

class OrganizationController extends Controller
{
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
        $user = User::find($id);
        
        return view('organization.AddOrganizationLogo')->with('user',$user);
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
        return view('organization.EditOrganization')->with('user',$user);
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

        return redirect("/organization/".$id."/edit")->with('success','Saved Changes');
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

    public function addorgaizationlogo(Request $request, $id){
        $validatedData = $request->validate([
            'orgImage' => 'required',]);

        $image =$request->file('orgImage');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('./Products'),$new_name);
        
        $userdetails = User::find($id);
        $userdetails->logo = $new_name;
        $userdetails->save();

        return redirect('/organization/'.$id)->with('success','Logo added');
    }
}
