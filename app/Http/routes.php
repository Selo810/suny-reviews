<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//search for school
Route::get('/schools/search', 'HomeController@search');

//Home page
Route::get('/home', 'HomeController@index');

//Welcome page
Route::get('/', 'HomeController@welcome');

//school details page
Route::get('/schools/school/{school}','HomeController@details');

// Creating comment
//redirect to login page if user try to add review without being logged in.
Route::get('/schools/school/{school}', 'HomeController@details')->middleware('auth');

Route::post('/schools/school/{school}', 'HomeController@storeComment');

// Delete Comment
Route::delete('/schools/details/{comment}', 'HomeController@destroy');


///***********************************************ADMIN************************************************///
///****************************************************************************************************///
Route::group(['middleware' => ['web']], function() {

//Allow only admin users to access these routs.
Route::auth();


Route::get('admin', 'AdminController@index');
Route::get('admin/schools/view', 'AdminController@schools');

//*******************Schools////////


// Creating schools
Route::get('admin/schools/create', 'SchoolsAdminController@create');
Route::post('admin/schools/create', 'SchoolsAdminController@store');


//view edit-form page
Route::get('admin/schools/{school}', 'AdminController@editForm');
Route::patch('admin/schools/{school}', 'SchoolsAdminController@edit');

//school details page
Route::get('/school/{school}','SchoolsAdminController@details');

// Delete School
Route::delete('admin/schools/{school}', 'AdminController@destroy');

//*******************Reviews////////
// Creating review
Route::get('/school/{school}', 'SchoolsAdminController@details');
Route::post('/school/{school}', 'SchoolsAdminController@storeComment');
    
    
    
});




