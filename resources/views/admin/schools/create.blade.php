
@extends('admin.layouts.app')
@section('content')

<div class="section" >
  <h4 class="black-text">Add School</h4>
<div class="row">
    <form class="col s12" method="POST" action="/admin/schools/create">
        
        <div class="form-group">
        <label for="school_name">School Name</label>
        <input type="text" class="form-control" id="school_name" name="school_name" required placeholder="School Name">
      </div>
      
      <div class="form-group">
        <label for="description">Description</label>
        <input type="text" class="form-control" id="description" name="description" required placeholder="Description">
      </div>
      
      <div class="form-group">
        <label for="description">Image</label>
        <input type="text" class="form-control" id="image" name="image" required placeholder="Image">
      </div>
      
      
      <div class="form-group">
        <label for="school_name">Stree</label>
        <input type="text" class="form-control" id="street" name="street" required placeholder="Street">
      </div>
      
      <div class="form-group">
        <label for="description">City</label>
        <input type="text" class="form-control" id="city" name="city" required placeholder="City">
      </div>
      
      <div class="form-group">
        <label for="description">State</label>
        <input type="text" class="form-control" id="state" name="state" required placeholder="state">
      </div>
      
      <div class="form-group">
        <label for="description">Zip Code</label>
        <input type="number" class="form-control" id="zip" name="zip" required placeholder="Zip Code">
      </div>
  
  
     <!--*** IMPORTANT ***-->
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <input type="submit" name="Submit" value="Add School">
       
    </form>
   @if (count($errors))
         <ul> 
             @foreach ($errors->all() as $errors)
                <li>{{ $error }}</li>
                
              @endforeach
         </ul>
   @endif
  </div>


        </div>
@endsection


            
            