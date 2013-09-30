<?php

class UserController extends BaseController {
	public function __construct(){
		$this->beforeFilter('auth',array('only'=>array('show','update','edit')));

		if(Auth::check()){
			$this->beforeFilter('permission:'.Request::segment(2),array('only'=>array('show','update','edit')));
		};
	}

	public function show($id){
		return View::make('user')->with('user',User::find($id));
	}

	public function create(){
		return View::make('userRegister');
	}

	public function store(){
		$aRules = array(
			'firstname' => 'required|alpha',
			'lastname' => 'required|alpha',
			'email' => 'required|email|confirmed',			
			'password' => 'required|confirmed',
		);

		//validator
		//the $_POST array can be extracted as Input::all()
		$validator = Validator::make(Input::all(),$aRules);

		if($validator->fails()){

			//return to the same form with sticky data
			return Redirect::to('users/create')->withErrors($validator)->withInput();
		}else{

			//create new user
			$aDetails = Input::all();

			$aDetails['password'] = Hash::make($aDetails['password']);

			User::create($aDetails);

			return Redirect::to('posts/2'); 
		}
	}

	public function edit($id){
		return View::make('userEdit')->with('user',User::find($id));
	}

	public function update(){
		$aRules = array(
			// 'unique' syntax is unique:table,column,except
			'email' => 'required|email|unique:users,email,'.$id,
			'firstname' => 'required|alpha',
			'lastname' => 'required|alpha'
		);
		$validator = Validator::make(Input::all(),$aRules);

		if($validator->fails()){
			return Redirect::to('users/'.$id.'/edit')->withErrors($validator)->withInput();
		}else{
			$oUser = User::find($id);

			// 'fill()' extracts the information from
			$oUser->fill(Input::all());
			$oUser->save();

			return Redirect::to('users/'.$id);
		}
	}



}