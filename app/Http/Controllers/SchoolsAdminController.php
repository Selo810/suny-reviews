<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use App\School;
use Auth;
use App\Comment;
use App\Http\Requests\SchoolRequest;
use Session;

class SchoolsAdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }
    
    // get details page
    public function details(School $school)
    {
        //$school =  compact('school');
        //$id = Session::get('school_id');
         
        $comments = Comment::where('school_id', '=', $school->id )->paginate(5);
        $user_id = Auth::user()->id;
        return view('admin.schools.details', [
            'comments' =>$comments,
            'school' =>compact('school')
        ]);
        
        //return view('admin.schools.details', compact('school'));
    }
    
    
    //**************************************SCHOOL******************************************//
    // Get create page
    public function create(){
        return view('admin.schools.create');
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    
    
    // post
    public function store(Request $request){
        
        $this->validate($request, [
            'school_name' => 'required',
            'description' => 'required',
            'image' => 'required',
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required'
            
            ]);
        
        
        $schools = new School;
        
        $schools->school_name = $request->input('school_name');
        $schools->description = $request->input('description');
        $schools->image = $request->input('image');
        $schools->street = $request->input('street');
        $schools->city = $request->input('city');
        $schools->state = $request->input('state');
        $schools->zip = $request->input('zip');
        
             
        $schools->save();
        //Session::flash('status', 'User was added');
        return redirect('/admin/schools/view');
       
       
        
    }
    
    
     //patch
    public function edit(Request $request, School $school) {
        $school->update($request->all());
        
        return redirect('/admin/schools/view');
    
    }
    
    //**************************************COMMENT******************************************//
    // post into the comments table 
    public function storeComment(Request $request){
  
  
       //Validate user's input 
       $this->validate($request, [
            'comment' => 'required',
            ]);
        
        $comments = new Comment;
        $comments->comment = $request->input('comment');
        $comments->user_id = Auth::user()->id;
        $comments->school_id = Session::get('school_id');
       
        $comments->save();
        
        Session::flash('message', 'Comment was added');
        return back();
        
    }
    
    
    
}
