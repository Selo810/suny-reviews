@extends('admin.layouts.app')

@section('content')

<div class="container">
  
  
@if (Session::has('status'))
   <div class="alert alert-info">{{ Session::get('status') }}</div>
@endif
    <h3>All Schools</h3>
<table class="table table-bordered">
   
    <thead>
      <tr>
        <th>ID</th>
        <th>School Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
     @foreach ($viewschools as $s)
    <tbody>
      <tr>
        <td>{{ $s->id }}</td>
        <td>{{ $s->school_name }}</td>
        <td><a class="btn-floating btn-large waves-effect waves-light blue" href="/admin/schools/{{$s->id}}">Edit</a></td>
        <td>
            <form action="/admin/schools/{{$s->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                
                <button class="btn btn-primary" name="delete">Delete</button>
                </form>
             
        </td>
      </tr>
    </tbody>
    
    @endforeach 
 </table>
  {!! $viewschools->links() !!}
 
 
 
 
 <!--Confirm for Delete-->
 
 <!--
 <button type="button" name="delete" class="btn btn-primary" value="{{$s->id}}" method="POST"  data-toggle="modal" data-target="#delete">
              Delete
            </button>    
            
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">DELETE SCHOOL</h4>
                  </div>
                  <div class="modal-body">
                    <p class="danger">Are you sure you want to delete this school?</p>
                  </div>
                  
                <div class="modal-footer">
                 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button><br /><span>
                 
                <form action="/admin/schools/{{$s->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                
                <button class="btn btn-primary" name="delete">Delete</button>
                </form></span>
                 
                  </div>
                
                 
                </div>
              </div>
          </div>
 
 -->
 

@endsection
