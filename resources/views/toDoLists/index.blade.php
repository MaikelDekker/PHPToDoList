@extends('layouts.app')

@section('content')
  <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
    @endif
    <div id="lists">
      <tbody>        
          @foreach($todolists as $todolist)
          <table class="listContainer" cellpadding="10">
            <tr class="listInfo">
              <th>{{$todolist['title']}}</td>
            </tr>
            <tr class="listInfo">
              <td>{{$todolist['description']}}</td>
            </tr>
            @foreach($tasks as $task)
            @php
                if($task['list_id'] == $todolist['id'])
                {
                  echo "<tr class='listInfo'>";
                  echo "<td>{$task['title']}</td>";
                  echo "</tr>";
                }
            @endphp
            @endforeach
            <tr class="listInfo">
              <td><a href="{{action('ToDoListController@show', $todolist['id'])}}" class="btn btn-warning">Tasks</a></td>
              <td><a href="{{action('ToDoListController@edit', $todolist['id'])}}" class="btn btn-warning">Edit</a></td>
              <td>
                <form action="{{action('ToDoListController@destroy', $todolist['id'])}}" method="post">
                  @csrf
                  <input name="_method" type="hidden" value="DELETE">
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>
          </table>
        @endforeach
      </tbody>
    </table>
  </div>
  <a id="addList" href="{{ route('todolists.create') }}">Add new list</a>
@endsection