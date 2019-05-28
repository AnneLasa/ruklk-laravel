<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Order;
use App\product;
use App\Favourite;
use App\Advertisment;
use DB;
use willvincent\Rateable\Rating;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       return Product::where('sellerId',"auth()->user('id')->id;")->first();
       return view('profile.DeleteProduct')->with('products',$products);
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
            'productPrice'=>'required|integer',
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
        $product->linkLocation = $request->input('locationlink');
        $product->productImage = $new_name;
        $product->sellerId = auth()->user('id')->id;
        $product->approval = 0 ;

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
       // $products = Product::all();
        $products = Product::where('sellerId', $id)->get();
        
        //$products= DB::table('products')->where('sellerId',$id)->first();
        
        return view('profile.DeleteProduct')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('profile.EditProduct');
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
        
        $products = Product::find($id);
        $sellerid = $products->sellerId;
        

        $products->delete();
        return redirect('/product/'.$sellerid)->with('success','Product Deleted');
    }

    public function searchproducts(){
        $search = Input::get('search');
        $type = Input::get('type');

        $ads = Advertisment::where(['status'=>1])->paginate(3);

        if($type=="" and $search==""){
            $Products = Product::where([['productName','LIKE','%'.$search.'%'],['approval','=',1]])->paginate(5);
            return view('search.search')->with('searchproduct', $Products)->with('ads',$ads);
        }
        else if ($type == 'all'){
            $Products = Product::where([['productName','LIKE','%'.$search.'%'],['approval','=',1]])->paginate(5);
            return view('search.search')->with('searchproduct', $Products)->with('ads',$ads);
        }
        else if($type == 'land'){
            $Products = Product::where([['category','=','land'],['approval','=',1],['productName','LIKE','%'.$search.'%']])->paginate(5);
            return view('search.search')->with('searchproduct', $Products)->with('ads',$ads);
        }
        else if($type == 'tree'){
            $Products = Product::where([['category','=', 'tree'],['approval','=',1],['productName','LIKE','%'.$search.'%']])->paginate(5);
            return view('search.search')->with('searchproduct', $Products)->with('ads',$ads);
        }
        else if($type == 'seed'){
            $Products = Product::where([['category','=','seed'],['approval','=',1],['productName','LIKE','%'.$search.'%']])->paginate(5);
            return view('search.search')->with('searchproduct', $Products)->with('ads',$ads);
        }
    }

    public function showproduct($id){
        $item = Product::find($id);
        $seller = User::find($item->sellerId);
        $rate = Rating::find($item->sellerId);

        return view('search.viewproduct')->with('item',$item)->with('seller', $seller)->with('rate', $rate);
    }
    
    public function buyproduct($id){
        $item = Product::find($id);
        $order = new Order();
        $order->sellerId = $item->sellerId;
        $order->buyerId =  auth()->user('id')->id;
        $order->productId = $id;
        $order->status = 0;
        
        $order->save();
        return redirect("/products/searchproduct/".$id)->with('success','Order made successfully');

    }

    public function favproduct($id){
        $item = Product::find($id);
        $fav = new Favourite();
        $fav->sellerId = $item->sellerId;
        $fav->buyerId =  auth()->user('id')->id;
        $fav->productId = $id;
        $fav->status = 0;

        $fav->save();
        return redirect("/products/searchproduct/".$id)->with('success','Added to favourite list');
    }


    //Mobile app controllers

    public function getSearchdata(){
        
    }

    public function MobileSearchProduct(Request $request){

         
        $search = data_get($request, 'search');
        $type = data_get($request, 'type');

        

        if($type=="" and $search==""){
            $Products = Product::where([['productName','LIKE','%'.$search.'%'],['approval','=',1]])->get();
           
            return $Products;
        }
        else if ($type == 'all'){
            $Products = Product::where([['productName','LIKE','%'.$search.'%'],['approval','=',1]])->get();
            return $Products;
        }
        else if($type == 'land'){
            $Products = Product::where([['category','=','land'],['approval','=',1],['productName','LIKE','%'.$search.'%']])->get();
            return $Products;
        }
        else if($type == 'tree'){
            $Products = Product::where([['category','=', 'tree'],['approval','=',1],['productName','LIKE','%'.$search.'%']])->get();
            return $Products;
        }
        else if($type == 'seed'){
            $Products = Product::where([['category','=','seed'],['approval','=',1],['productName','LIKE','%'.$search.'%']])->get();
            return $Products;
        }
    }
//mobile app api controllers
    public function MobileShowProduct($id){
        $item = Product::find($id);
        $seller = User::find($item->sellerId);
        
        return ['item'=>$item,'seller'=>$seller];
    }
    public function viewfav($id) {
        $fav = Favourite::where('BuyerId', $id)->where('status','=',0)->get();
        return $fav;
    }

    }   
