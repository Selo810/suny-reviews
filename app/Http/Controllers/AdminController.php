<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    
    // Allow only admin users to access this page 
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    public function index(Request $request)
    {
        //return view('admin.index');
        $search = $request->input('search');
       
        //Query for getting the schools
        $schools = School::where('school_name', 'LIKE', '%' .$search. '%');
        
        return view('admin.index', [
            'viewschools' =>$schools->orderBy('school_name', 'asc')->distinct('school_id')->paginate(3)
        ]);
        
        
    }
    
    //list all the schools
     public function schools()
    {
        return view('admin.schools.view', [
            'viewschools' =>School::orderBy('school_name', 'asc')->distinct('school_id')->paginate(10)
        ]);
        
        
    }
    
    
    //View edit form
      public function editForm(School $school) {
        return view('admin.schools.edit', compact('school'));
    }
    
    
    // DELETE SCHOOL
    public function destroy(Request $request, School $school) {
        $school->delete($request->all());
        return back();
    }
}
