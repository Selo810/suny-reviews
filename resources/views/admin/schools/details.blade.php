@extends('admin.layouts.app')

@section('content')

<div class="container">
    
   
@foreach ($school as $s)
<?php
  Session::set('school_id', $s->id );
?>
@endforeach 
  

@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
    <div class="row">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    
                    
                     <form class="form-inline  " method="GET" action="/admin" >
                        <input type="text" name="search" class="form-control" placeholder="Search" style="width: 50%;"/>

                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
    
                    </form>

                </div>
                
                @foreach ($school as $s)
                <div class="panel-body">
                    <img src="{{ $s->image }}" alt="..."  style="height: 350px;" width="100%">
                </div>
                <h3 style="color:#0d47a1;">{{ $s->school_name }}<span style="color:#212121;"> || </span><span>{{$s->street}} {{ $s->city }}, {{ $s->state }} {{$s->zip}}</span></h3>
                <p>{{$s->description}}</p>
                @endforeach 
                
            </div>
            
  
            
            <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">Recent Reviews</div>
            
              <!-- List group -->
             
              @foreach ($comments as $c)
              
              <dl class="dl-horizontal">
                <dt>{{ date('M j, Y h:ia', strtotime ($c->created_at)) }}</dt>
                <dd>{{ $c->comment }} <span><form action="/schools/details/{{$c->id}}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-xs pull-right btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                </form></span></dd>
              </dl>
              @endforeach
               
               
            </div>
             {!! $comments->links() !!} 
            
            
            <!-- View Comments -->
            <div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addComment">
              Add Review
            </button></div>
            
            
            <!-- Comment add form-->
            
            <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Review</h4>
                  </div>
                  <form class="col s12" method="POST" action="/school/{school}">
                      
                  <div class="form-group">
                    <label for="comment" class="control-label">Comment:</label>
                    <input type="text" class="form-control" id="comments" name="comment" required>
                  </div>
                  
                  <!--*** IMPORTANT ***-->
                  <div class="modal-footer">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input class="btn btn-primary" type="submit" name="Submit" value="Add Review">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </form>
                 
                </div>
              </div>
            </div>
        

        </div>
    
    
    
    </div>
  
    

    
    
</div>




@endsection
