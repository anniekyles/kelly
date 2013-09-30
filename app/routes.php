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
	return View::make('topics')->with('topic',Topic::find(2));
});

//________________________________CONTENT ROUTES_____________________________________

Route::get('posts/create', function(){
	return View::make('postCreate')->with ('aTopics', DB::table('topics')->lists('name','id'));
})->before('admin.permission');

Route::post('posts', function(){
	$aRules = array('title'=>'required','content'=>'required');
	$validaor = Validator::make(Input::all(),$aRules);

	if($validaor->fails()){
		return Redirect::to('posts/create');
	} else {
		$oPost = Post::create(Input::all());
		$oPost->save();
		return Redirect::to('topics/'.Input::get('topic_id'));
	}
});

Route::get('posts/{id}', function($id){
	return View::make('posts')->with('post',Post::find($id));
});

Route::get('topics/create', function(){
	return View::make('topicCreate');
})->before('admin.permission');

Route::post('topics', function(){
	$aRules = array('name'=>'required');
	$validaor = Validator::make(Input::all(),$aRules);

	if($validaor->fails()){
		return Redirect::to('topics/create');
	} else {
		$oTopic = Topic::create(Input::all());
		$oTopic->save();
		return Redirect::to('topics/2');
	}
});

Route::get('topics/{id}', function($id){
	return View::make('topics')->with('topic',Topic::find($id));
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