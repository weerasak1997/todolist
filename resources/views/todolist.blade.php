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
.bodycard{
  padding-left: 20px;
  padding-right: 20px;
  padding-bottom: 20px;
}
.padding-checkbook {
  padding-top: 10px;
  padding-left: 60px;
}
.no-gutters {
  margin-right: 0;
  margin-left: 0;

  > .col,
  > [class*="col-"] {
    padding-right: 0;
    padding-left: 0;
  }
}
.card {
    min-height: 950px;
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
  <div class="container">
  <div class="row">
    <div class="col-sm">
      <div class="card">
        <div class="bodycard">
          <br>
          <h2 class="text-center">To Do List</h2>
          <br>
          <!-- @for ($i = 0; $i < sizeof($arrayint); $i++) {
          <h2>{{$arrayint[$i]}}}</h2>
          @endfor -->
          @php
          $i = 0;
          @endphp
              @foreach($events as $row)
                <div class="group mb-1">
                  <div class="row no-gutters">
                    <div class="col-sm-1">
                    <!-- <div class="padding-checkbook"> -->
                      <!-- <input type="checkbox" name="completed" id="checkbox" @click="{{action('InsertController@edit',$row['id'])}}"
                      @if($row['completed']=1)
                          checked
                      @endif
                      > -->
                      @php
                      $id = $row['id'];
                      $checkStatus = $arrayint[$i];
                      @endphp
                      @if($arrayint[$i]==1)
                      <form method="post" action="{{url('updateevent/'.$id)}}">
                        @csrf
                        <a href="updateevent/{{$id}}/{{$checkStatus}}" role="button" class="btn btn-success pl-1 pr-1">Success</a>
                      </form>
                      
                      @endif
                      @if($arrayint[$i]==0)
                      <form method="post" action="{{url('updateevent/'.$id)}}">
                        @csrf
                        <a href="updateevent/{{$id}}/{{$checkStatus}}" role="button" class="btn btn-secondary pl-1 pr-1">Not Done</a>
                      </form>
                      @endif
                    <!-- </div> -->
                    </div>
                    <div class="col-sm-10">
                    <h2>{{$row['event']}}</h2>
                    </div>
                    <div class="col-sm-1">
                    <form method="post" class="delete_form" action="{{action('InsertController@destroy',$row['id'])}}">
                      @csrf
                      <input type="hidden" name="_method" value="DELETE" />
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                  </div>
                </div>
                @php
                $i++;
                @endphp
              @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on('change', '#checkbox', function(e) {
  alert("sdsdsd")
});
  // $(document).ready(function(){
  //   $('#checkbox').change(function() {
  //     alert("sdsdsd")
  //   })
  //   $('.delete_form').on('submit',function(){
  //     if(confirm("Do you delete this data?")){
  //       return true;
  //     }else{
  //       return false;
  //     }
  //   });
  // });
</script>
<!-- <div class='d-flex flex-row justify-content-center'>
    <button type="button" class="btn btn-outline-success btnadd"><h1>Add To Do List</h1></button>  
</div> -->
@stop
