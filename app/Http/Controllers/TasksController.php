<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index() {
        
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) {                  //route model binding
            
        // $task = DB::table('tasks')->find($id);       //query builder
        // $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }
}
