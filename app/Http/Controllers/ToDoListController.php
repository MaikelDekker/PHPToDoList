<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToDoListController extends Controller
{
    public function index()
    {
        $todolists=\App\ToDoList::all();
        return view('toDoLists.index',compact('todolists'));
    }
    public function create()
    {
        return view('toDoLists.create');
    }
    public function store(Request $request)
    {
       $todolist= new \App\ToDoList;
       $todolist->title=$request->get('title');
       $todolist->description=$request->get('description');
       $todolist->save();       
       return redirect()->route('todolists.index');
    }
    public function show($id)
    {
        $todolist = \App\ToDoList::find($id);
        $tasks = \App\Task::where('list_id', $id)->get();
        return view('toDoLists.show',compact('todolist', 'tasks', 'id'));
    }
    public function edit($id)
    {
        $todolist = \App\ToDoList::find($id);
        return view('toDoLists.edit',compact('todolist','id'));
    }
    public function update(Request $request, $id)
    {
        $todolist= \App\ToDoList::find($id);
        $todolist->title=$request->get('title');
        $todolist->description=$request->get('description');
        $todolist->save();
        return redirect()->route('todolists.index');
    }
    public function destroy($id)
    {
        $todolist = \App\ToDoList::find($id);
        $todolist->delete();
        return redirect()->route('todolists.index');
    }
}
