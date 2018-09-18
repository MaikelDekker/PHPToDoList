@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Task adder</h2><br/>
      <form method="post" action="{{url('tasks')}}" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <input type="hidden" class="form-control" name="list_id" value="{{$id}}">
              <label for="Title">Title:</label>
              <input type="text" class="form-control" name="title" value="{{ old('title') }}">
              <label for="Duration">Duration:</label>
              <input type="text" class="form-control" name="duration" value="{{ old('duration') }}">
              <label for="Status">Status:</label><br>
              <select name="status">
                <option value="Completed">Completed</option>
                <option value="Awaiting completion">Awaiting completion</option>
              </select>
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
    </div>
  @endsection