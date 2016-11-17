
@extends('admin.layouts.app')
@section('content')

<div class="section" >
  <h4 class="black-text">Edit School Information</h4>
<div class="row">
    <form class="col s12" method="POST" action="/admin/schools/{{$school->id}}">
        {{ method_field('PATCH') }}
        <div class="form-group">
        <label for="school_name">School Name</label>
        <input type="text" class="form-control" id="school_name" name="school_name" placeholder="School Name" required value="{{$school->school_name}}">
      </div>
      
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" placeholder="Description" required value="{{$school->description}}">
      </div>
      
      <div class="form-group">
        <label for="description">Image</label>
        <input type="text" class="form-control" id="image" name="image" placeholder="Image" required value="{{$school->image}}">
      </div>
      
      
      <div class="form-group">
        <label for="school_name">Stree</label>
        <input type="text" class="form-control" id="street" name="street" placeholder="Street"  required value="{{$school->street}}">
      </div>
      
      <div class="form-group">
        <label for="description">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="City" required value="{{$school->city}}">
      </div>
      
      <div class="form-group">
        <label for="description">State</label>
        <input type="text" class="form-control" id="state" name="state" placeholder="state" required value="{{$school->state}}">
      </div>
      
      <div class="form-group">
        <label for="description">Zip Code</label>
        <input type="number" class="form-control" id="zip" name="zip" placeholder="Zip Code" required value="{{$school->zip}}">
      </div>
  
  
     <!--*** IMPORTANT ***-->
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="Submit" value="Save">
       
    </form>
   
  </div>


        </div>
@endsection


            
            