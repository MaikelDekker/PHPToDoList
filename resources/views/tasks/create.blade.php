@extends('layouts.app')

@section('content')
    <div class="container">
      <h2>Task adder</h2><br/>
      <form method="post" action="{{url('tasks')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Description">Description:</label>
              <input type="text" class="form-control" name="description">
              <label for="Description">list_id:</label>
              <input type="text" class="form-control" name="list_id" value="{{$id}}">
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