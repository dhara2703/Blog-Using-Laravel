<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// View => view()

// Request => request()

// App => app()

// App::bind('App\Billing\Stripe', function() {
//     return new  \App\Billing\Stripe(config('services.stripe.secret'));
// });

//$stripe = App::make('App\Billing\Stripe');
//$stripe = resolve('App\Billing\Stripe');
// $stripe = app('App\Billing\Stripe');

//$stripe = resolve('App\Billing\Stripe');
// $stripe1 = resolve('App\Billing\Stripe');
// $stripe2 = resolve('App\Billing\Stripe');

//App::instance('App\Billing\Stripe', $stripe);



//dd(resolve('App\Billing\Stripe'));


Route::get('/tasks', 'TasksController@index');

Route::get('/tasks/{task}', 'TasksController@show');


Route::get('/', 'PostsController@index')->name('home'); 

Route::get('/posts/create', 'PostsController@create');

Route::post('/posts', 'PostsController@store');

Route::get('/posts/{post}', 'PostsController@show'); 


Route::get('/posts/tags/{tag}', 'TagsController@index'); 



Route::post('/posts/{post}/comments','CommentsController@store');

//Route::get('/register', 'AuthController@register');
Route::get('/register', 'RegistrationController@create');

Route::post('/register', 'RegistrationController@store');

//Route::get('/login', 'AuthController@login');
Route::get('/login', 'SessionsController@create');

Route::post('/login', 'SessionsController@store');


Route::get('/logout', 'SessionsController@destroy');






//Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


// GET      /posts              : select * from posts
// GET      /posts/create       : To create a post - and displays a form to create a post
// POST     /posts/             : will be a submitted post to store it
// GET      /posts/{id}/edit    : to edit an existing post
// PATCH    /posts/{id}         : to submit a form for edit a post 
// GET      /posts/{id}         : displays a single post
// DELETE   /posts/{id}         : deletes a post        



// To make this work 
// we need Controller : App\Http\Controllers - PostsController
//         Eloquent model : App\ModelName - Post
//         Migration : Database\migrations - create_posts_table

// Default Welcome page index - where it sows three tasks
        Route::get('/welcome', function () {
            
            // $name = 'Dhara';

            // $tasks = [
            //     'Go to the store',
            //     'Finish my screencast',
            //     'Clean the house'
            // ];

            // Episode 6 Using database usig diffrent ways to get record 
            //$tasks = DB::table('tasks')->get();
            // $tasks = DB::table('tasks')->where('created_at','2019-09-13 11:26:22')->get();
            // $tasks = DB::table('tasks')->where('id',3)->get();
            // $tasks = DB::table('tasks')->latest()->get();
            // $tasks = DB::table('tasks')->oldest()->get();
            
            // Episode 7 Eloquent is Laravel's Active Record implementation, which allows 
            //           each of your models to be associated with a companion database table
            $tasks = App\Task::all();

            // return view('welcome', ['name' => 'World']);
            // return view('welcome')->with('name', 'World');
            // return view('welcome', ['name' => $name]);
            // return view('welcome', compact('name'));

            // return view('welcome', ['tasks' => $tasks]);
            // return view('welcome')->with('tasks', $tasks);
            // return $tasks;
            return view('welcome', compact('tasks'));

        });


// Moved to controller for as an index page
    // Episode 6: to pass task id as a parameter to specfic route
    // Route::get('/tasks', function () {

    //     // $tasks = DB::table('tasks')->latest()->get();
    //     $tasks = Task::all();


    //     // return view('tasks/show', compact('tasks')); 
    //     return view('tasks.index', compact('tasks')); 

    // });


// Moved to controller for as an show page
    // // Episode 6: to pass task id as a parameter to specfic route
    // Route::get('/tasks/{task}', function ($id) {

    //     // $task = DB::table('tasks')->find($id);
    //     $task = Task::find($id);
    
    //     // To get the incomplete task(set to false(0)). These are also known as query scopes
    //     // Task::incomplete()->get(); 
    //     //         or 
    //     //Task::incomplete();


    //     // dd($task); // dd stands for Die and Dump - this is laravel's short hand function

    //     // return view('tasks/show', compact('tasks')); 
    //     return view('tasks.show', compact('task')); 

    // });


    // We can use either /about or about - as both works fine
    Route::get('/about', function () {
        return view('about');
    });



