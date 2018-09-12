@extends('layouts.app')

@section('content')
  <div class="container">
    <h2>Edit A Form</h2><br  />
      <form method="post" action="{{action('ToDoListController@update', $id)}}">
      @csrf
      <input name="_method" type="hidden" value="PATCH">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="form-group col-md-4">
          <label for="title">title</label>
          <input type="text" class="form-control" name="title" value="{{$todolist->title}}">
        </div>
      </div>
      <div class="row">
        <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" value="{{$todolist->description}}">
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