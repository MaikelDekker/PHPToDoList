@extends('layouts.app')

@section('content')
  <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <h1 id="title"></h1>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th colspan="3">Action</th>
      </tr>
    </thead>
      <tbody>
        
          @foreach($todolists as $todolist)
          <tr>
            <td>{{$todolist['id']}}</td>
            <td>{{$todolist['title']}}</td>
            <td>{{$todolist['description']}}</td>
            
            <td><a href="{{action('ToDoListController@show', $todolist['id'])}}" class="btn btn-warning">Show</a></td>
            <td><a href="{{action('ToDoListController@edit', $todolist['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('ToDoListController@destroy', $todolist['id'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <th><a href="{{ route('todolists.create') }}">Add new list</a></th>
  </div>
@endsection