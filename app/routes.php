<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', function(){
	return View::make('pages')->with('page',Pages::find(2));
});

//________________________________CONTENT ROUTES_____________________________________

Route::get('posts/create', function(){
	return View::make('postCreate')->with ('aPages', DB::table('pages')->lists('name','id'));
})->before('admin.permission');

Route::post('posts', function(){
	$aRules = array('title'=>'required','content'=>'required');
	$validaor = Validator::make(Input::all(),$aRules);

	if($validaor->fails()){
		return Redirect::to('posts/create');
	} else {
		$oPost = Post::create(Input::all());
		$oPost->save();
		return Redirect::to('pages/'.Input::get('page_id'));
	}
});

Route::get('posts/{id}', function($id){
	return View::make('posts')->with('post',Post::find($id));
});

Route::get('pages/create', function(){
	return View::make('pageCreate');
})->before('admin.permission');

Route::post('pages', function(){
	$aRules = array('name'=>'required');
	$validaor = Validator::make(Input::all(),$aRules);

	if($validaor->fails()){
		return Redirect::to('pages/create');
	} else {
		$oPage = Page::create(Input::all());
		$oPage->save();
		return Redirect::to('pages/2');
	}
});

Route::get('pages/{id}', function($id){
	return View::make('pages')->with('page',Page::find($id));
});

//________________________________USER ROUTES_____________________________________


Route::resource('users', 'UserController');


//_________________________________AUTHENTICATION____________________________
Route::get('login', function(){
	return View::make('login');
});

Route::post('login', function(){
	$aDetails = array(
		'email' => Input::get('email'),
		'password' => Input::get('password')
		);

	if(Auth::attempt($aDetails)){
		// return Redirect::intended('users/'.Auth::user()->id);
		return Redirect::to('posts/2');
	} else {
		return Redirect::to('login')->with('error', 'Incorrect combination');
	}
});

Route::get('logout',function(){
	Auth::logout();
	return Redirect::to('posts/2');
});

Route::post('comments', function(){
	$aRules = array('title'=>'required','content'=>'required');

	$validaor = Validator::make(Input::all(),$aRules);

	if($validaor->fails()){
		return Redirect::to('posts/'.Input::get('post_id'));
	} else {
		$oComment = Comment::create(Input::all());
		$oComment->save();
		return Redirect::to('posts/'.Input::get('post_id'));
	}
});