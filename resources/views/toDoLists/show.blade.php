@extends('layouts.app')

@section('content')
  <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>List_ID</th>
        <th>Description</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
      <tbody>
        
          @foreach($tasks as $task)
          <tr>
            <td>{{$task['id']}}</td>
            <td>{{$task['list_id']}}</td>
            <td>{{$task['description']}}</td>
            <td><a href="{{action('TaskController@edit', $task['id'])}}" class="btn btn-warning">Edit</a></td>
            <td>
              <form action="{{action('TaskController@destroy', $task['id'])}}" method="post">
                @csrf
                <input name="_method" type="hidden" value="DELETE">
                <button class="btn btn-danger" type="submit">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <a href="{{ route('tasks.create', [$id]) }}">Add new task</a></th>
  </div>
@endsection