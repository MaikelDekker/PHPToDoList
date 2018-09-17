@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Edit A Form</h2><br  />
      <form method="post" action="{{action('TaskController@update', $id)}}">
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
      <input name="_method" type="hidden" value="PATCH">
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <input type="hidden" class="form-control" name="list_id" value="{{$task->list_id}}">
            <label for="Title">Title</label>
            <input type="text" class="form-control" name="title" value="{{$task->title}}">
            <label for="Duration">Duration</label>
            <input type="text" class="form-control" name="duration" value="{{$task->duration}}">
            <label for="Status">Status:</label><br>
            <select name="status">
              <option value="Finished">Finished</option>
              <option value="Inactive">Inactive</option>
              <option value="Active">Active</option>
            </select>
          </div>
        </div>
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4" style="margin-top:60px">
          <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
        </div>
      </div>
    </form>
  </div>
@endsection