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
       $task= new \App\Task;
       $task->description=$request->get('description');
       $task->list_id=$request->get('list_id');
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
        $task= \App\Task::find($id);
        $task->description=$request->get('description');
        $task->list_id=$request->get('list_id');
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