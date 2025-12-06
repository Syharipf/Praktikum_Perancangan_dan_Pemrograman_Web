<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request; 

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::orderBy('created_at', 'desc')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request) {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            Task::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => 'pending' 
            ]);

            return redirect()->route('tasks.index')
                ->with('success', 'Task Added Successfully');
    }

    public function edit($id) {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required'
        ]);

        $task = Task::findOrFail($id);
        $task->update($request->all());

        // Pesan sukses edit
        return redirect()->route('tasks.index')
            ->with('success', 'Task Edited Successfully');
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        // Pesan sukses hapus
        return redirect()->route('tasks.index')
            ->with('success', 'Task Deleted Successfully');
    }
}