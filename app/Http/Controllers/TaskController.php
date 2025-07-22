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
    public function store(Request $request) {

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

        return redirect()->route('tasks.index')->with('success', 'Task Created Successfully');
    }

    public function edit($id) {
        $task = Task::findOrFail($id);
        return view('tasks.edit', ['task' => $task]);
    }

    public function update(Request $request, $id) {

        $request->validate([
                'title' => 'required|max:255',
                'description' => 'nullable',
                'due_date' => 'nullable|date'
        ]);

        $task = Task::findOrFail($id);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfly');
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success'.'Task deleted successfully');

    }

    public function toggleStatus($id) {
        $task = Task::findOrFail($id);
        $task->is_done = !$task->is_done;
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task Status Updated');
    }

}
