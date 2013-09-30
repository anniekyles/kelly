@extends('includes.template')

@section('content')

<article>
	<h2>Log In</h2>

	{{ Form::open(array('url' => 'login')) }}


	{{ Form::label('email', 'Email') }}
	{{ Form::text('email') }}

	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}

	{{Form::submit('Log In') }}

	{{ Form::close() }}

	<p>{{Session::get('error')}}</p>

</article>
@stop