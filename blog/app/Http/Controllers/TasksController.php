<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
 
    public function index()
    {
        // This will respond to Tasks

        // $tasks = DB::table('tasks')->latest()->get();
        $tasks = Task::all();


        // return view('tasks/index', compact('tasks')); 
        return view('tasks.index', compact('tasks')); 

    }

   
    public function show(Task $task) // Task::find(wildcard) The $task variable name must be same as web.php Route declaration wildcard else it will not work
    // public function show($id) 
    {
        // This respond to GET /tasks/id

        // $task = DB::table('tasks')->find($id);
        //$task = Task::find($id);
    
        // To get the incomplete task(set to false(0)). These are also known as query scopes
        // Task::incomplete()->get(); 
        //         or 
        //Task::incomplete();


        // dd($task); // dd stands for Die and Dump - this is laravel's short hand function

        // return view('tasks/show', compact('task')); 

        // This returns the JSON object for that id
        // return $task; 

        return view('tasks.show', compact('task')); 

    }





 
}
