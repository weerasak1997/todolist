@extends('layout.master')
@section('navbar')
<form class="form-inline my-2 my-lg-0">
  <button class="btn btn-outline-success my-2 my-sm-0" type="button" data-toggle="modal" data-target="#AddeventDialog" >Add Todolist</button>
</form>
@stop
@section('head')
<style>
.btnadd {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  width:50%;
}
</style>
@stop
@section('title','todolist')
@section('body')
<div class="modal fade" id="AddeventDialog" tabindex="-1" role="dialog" aria-labelledby="AddeventDialogLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
  <form method="post" action="{{url('insertevent')}}">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddeventDialogLabel">Add Todolist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <textarea  class="form-control" rows="10" name="event" id="event"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" href="insertevent" class="btn btn-primary">Add</button>
      </div>
    </div>
  </form>
  </div>
</div>

  @if(count($errors)>0)
    <div class="alert alert-danger"> 
      <ul>@foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
  @endif
  @if(\Session::has('success'))
    <div class="alert alert-success">
      <p>{{\Session::get('success')}}</p>
    </div>
  @endif
<!-- <div class='d-flex flex-row justify-content-center'>
    <button type="button" class="btn btn-outline-success btnadd"><h1>Add To Do List</h1></button>  
</div> -->
@stop
