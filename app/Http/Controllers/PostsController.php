<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\post;
use App\Category;
use Session;
use Image;
use Storage;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog posts in the database
        $posts = Post::orderBy('id','desc')-> paginate(10);
       return view('posts.index')->withPosts($posts);

        //return a view and pass in the above variable
        //return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the data
        $this-> validate($request,array(
            'title'=> 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' => 'required',
            'featured_image' => 'sometimes| image'

        ));
        //store in the database
        $post = new Post;

        $post -> title = $request -> title;
        $post -> slug = $request -> slug;
        $post -> category_id = $request -> category_id;
        $post -> body = $request -> body;

        //save our image
        if ($request->hasFile('featured_image')){
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('wikiimages/' . $filename);
            Image::make($image)->resize(800,400)->save($location);

            $post -> image = $filename;
        }
        

        $post -> save();

        Session::flash('success','The blog post was successfully save!');

        return redirect() -> route('posts.show' , $post -> id );

        // redirect to another page
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::find($id);
        return view('posts.show') -> withPost ($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as var
        $post= Post::find($id);
        $categories = Category::all();
        $cats = array();
        foreach ($categories as $category) {
            $cats[$category->id] = $category->name;

        }

        // return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats);
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
       //Validate the data
        $post = Post::find($id);
        

        $this-> validate($request,array(
            'title'=> 'required|max:255',
            'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body' => 'required',
            'featured_image' => 'image'

        ));
        

        //save the data to the database
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->body = $request->input('body');

        if ($request->hasFile('featured_image')){

            //add new photo
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('wikiimages/' . $filename);
            Image::make($image)->resize(800,400)->save($location);
            $soldFilename = $post->image;

            //update the database
            $post->image= $filename;

            //Delete the old photo
            Storage::delete($oldFilename);
        }

        $post->save();

        //set flash data with success message
        Session::flash('success', 'This post was succesfully saved.');

        //redirect with flash data to posts.show
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success','The post was succesfully deleted');
        return redirect()-> route('posts.index');
    }
}
