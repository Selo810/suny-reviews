@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1 ">
            <div class="panel panel-default ">
                <div class="panel-heading">
                    
                    <form class="form-inline" method="GET" action="/" >
                        <input type="text" name="search" class="form-control" placeholder="Search" style="width: 50%;"/>

                        
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
    
                    </form> 
              
                </div>
                
                <div class="panel-body">
                    <img src="http://cdn.magnifymoney.com/2016/09/college-students-magnifymoney-e11.jpg" alt="..." width="100%">
                </div>
              
            </div>
        </div>
    
    </div>
  <div id="rateYo"></div>
    <div class="row">
      @foreach ($viewschools as $s)
        <div class="col-sm-6 col-md-4">
          <div class="thumbnail">
            <img src="{{ $s->image }}" alt="..." style="height: 150px;" width="100%">
            <div class="caption">
              <h3>{{ $s->school_name }}</h3>
              <p>{{ $s->city }}, {{ $s->state }}</p>
              <p><a href="/schools/school/{{ $s->id}}" class="btn btn-primary" role="button">View</a></p>
              <!--<p><a href="#" class="btn btn-primary" role="button">Select</a> <a href="#" class="btn btn-default" role="button">Button</a></p>-->
            </div>
          </div>
        </div>
        @endforeach 
    </div>
 {!! $viewschools->links() !!}
    
</div>

 
@endsection
