<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\School;
use App\Comment;
use Auth;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   // public function __construct()
   // {
   //     $this->middleware('auth');
   // }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('home', [
            'viewschools' =>School::orderBy('school_name', 'asc')->distinct('school_id')->take(3)->get()
        ]);
        
    }
    
    
    public function welcome(Request $request)
    {
        $search = $request->input('search');
       
        $schools = School::where('school_name', 'LIKE', '%' .$search. '%');
        
        
        return view('welcome', [
            'viewschools' =>$schools->orderBy('school_name', 'asc')->distinct('school_id')->paginate(3)
        ]);
        
    }
    
    
    // get details page
    public function details(School $school)
    {
        // $school = compact('school');
         //$id = Session::get('school_id');
         
         
         $comments = Comment::where('school_id', '=', $school->id)->paginate(5); //need to fix id 
         
         return view('schools.details', [
            'comments' =>$comments,
            'school' =>compact('school')
            
        ]);
        
       // return view('schools.details', compact('school'));
    }
    
     
     //**************************************COMMENT******************************************//
    // post
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
        
        //rediract back to the same page
        return back();
        
    }
    
    // DELETE COMMENT
    public function destroy(Request $request, Comment $comment) {
        $comment->delete($request->all());
        
        //rediract back to the same page         
        return back();
    }
    
}
