<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

use App\Repositories\Posts;

use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //public function index(\App\Tag $tag = null)
    public function index(Posts $posts)
    {
        // $posts =  Post::all();
        // $posts =  Post::latest()->get();
        // $posts =  Post::orderBy('created_at', 'asc')->get();
        //$posts =  Post::orderBy('created_at', 'desc')->get();

        //return session('message');
        $posts = Post::latest()
                ->filter(request(['month', 'year']))
                ->get();

        //$posts = (new \App\Repositories\Posts)->all();
        
        //dd($posts);

        //$posts = $posts->all();

        // $archives = Post::archives();

        // return $archives;
        
        // return view('posts.index', compact('posts' , 'archives' ));
        
        return view('posts.index', compact('posts'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Create a new post using the request data
        // Save it to the database
        // And the redirect to the home page
        // dd(request()->all());

        // dd(request('title'));
        // dd(request('body'));
        // dd(request(['title', 'body']));


        // This is not working -- BadMethodCallException - Method [validateReqired] does not exist.
        $this->validate(request(),  [
            'title' => 'required',
            'body' => 'required'
        ]);

        // To give an access to the user for publishing the post
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );
        


        session()->flash(

            'message', 'Your post has now been published'

        );

//approch 1        
        // Create a new post using the request data
        
        // // Both works same after adding use App\Post
    //      $post = new Post;  // or
    //     // $post = new \App\Post;
    //      $post->title = request('title');
    //      $post->body = request('body');


    //     // // Save it to the database  
    //  $post->save();

//approch 2
        //------------------------------        Another way of etting the array values       --------------//
        // it throws an exception of MassAssignmentException as those propertie can be changed using inspect or 
        // Post::create(request()->all()); can take as many arguments as the form have, which indeed is not secure 
        //               for ex. user_id can be changed for the current post and it will still accept it
        //           another ex. ['subscription_status' => 1] turning on can cause issues too
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()  //'user_id' => auth()user->id
        // ]);

//approch 3
        //Post::create(request(['title', 'body', 'user_id']));


        // // And then Redirect to home page
         return redirect('/');
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // This uses wrap model binding where the varible names must match..  Another way of doing it is public function show($id) where varible name can be anything
         // $post = Post::find($id);
        return view('posts.show', compact('post'));
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
