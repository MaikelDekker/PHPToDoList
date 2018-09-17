<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return redirect()->action('ToDoListController@index');
    }
    public function create($id)
    {
        $todolist = \App\ToDoList::find($id);

        return view('tasks.create')->with('id', $id);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'duration' => 'required',
        ]);
        $task= new \App\Task;
        $task->list_id=$request->get('list_id');
        $task->title=$request->get('title');
        $task->status=$request->get('status');
        $task->duration=$request->get('duration');
        $task->save();
        return redirect()->route('todolists.show', [$task->list_id]);
    }
    public function show($id)
    {
        
    }
    public function edit($id)
    {
        $task = \App\Task::find($id);
        return view('tasks.edit',compact('task','id'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'status' => 'required',
            'duration' => 'required',
        ]);
        $task= \App\Task::find($id);
        $task->list_id=$request->get('list_id');
        $task->title=$request->get('title');
        $task->status=$request->get('status');
        $task->duration=$request->get('duration');
        $task->save();
        return redirect()->route('todolists.show', [$task->list_id]);
    }
    public function destroy($id)
    {
        $task = \App\Task::find($id);
        $task->delete();
        return redirect()->route('todolists.show', [$task->list_id]);
    }
}