<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//custom
use App\Models\Task;

class TaskController extends Controller
{
    //Display task list - all task
    public function index() {
        
        $tasks = Task::orderBy('created_at', 'desc')->get();
        
        return view('tasks.index', ['tasks' => $tasks]);
    }

    //Create New Task Form

    public function create() {
        return view('tasks.create');
    }

    //Process to Store Newly Created Task
    public function storeTask(Request $request) {

        $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'nullable',
                'due_date' => 'nullable|date'
            ]
            );
        
        Task::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'due_date' => $request->due_date,
            ]
            );

        return redirect()->route('tasks.list')->with('success', 'Task Created Successfully');
    }


}
