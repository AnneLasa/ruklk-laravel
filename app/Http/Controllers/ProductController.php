<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\product;

class ProductController extends Controller
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
        return view('profile.AddProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'productName'=>'required',
            'category'=>'required',
            'productDescription'=>'required',
            'productPrice'=>'required',
            'location'=>'required',
            'productImage'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
            
        ]);
        
        $image =$request->file('productImage');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('./Products'),$new_name);

        $product =  new Product;
        $user = new User;

        $product->productName = $request->input('productName');
        $product->category = $request->input('category');
        $product->productDescription = $request->input('productDescription');
        $product->productPrice = $request->input('productPrice');
        $product->location = $request->input('location');
        $product->productImage = $new_name;
        $product->sellerId = auth()->user('id')->id;

        $product->save();

        
        
        return redirect("/product/create")->with('success','Product added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
}
