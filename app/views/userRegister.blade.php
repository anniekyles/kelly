@extends('includes.template')

@section('content')

<article>
	<h2>Register</h2>

	<h2>Register New Account</h2>

	{{ Form::open(array('url' => 'users')) }}

	{{ Form::label('firstname', 'First name') }}
	{{ Form::text('firstname', Input::old('firstname')) }}
	{{ $errors->first('firstname','<p class="error">:message</p>') }}

	{{ Form::label('lastname', 'Last name') }}
	{{ Form::text('lastname', Input::old('lastname')) }}
	{{ $errors->first('lastname','<p class="error">:message</p>') }}

	{{ Form::label('email', 'Email') }}
	{{ Form::text('email', Input::old('email')) }}
	{{ $errors->first('email','<p class="error">:message</p>') }}

	{{ Form::label('email_confirmation', 'Confirmed email') }}
	{{ Form::text('email_confirmation', Input::old('email_confirmation')) }}

	{{ Form::label('password', 'Password') }}
	{{ Form::password('password') }}
	{{ $errors->first('password','<p class="error">:message</p>') }}

	{{ Form::label('password_confirmation', 'Confirmed password') }}
	{{ Form::password('password_confirmation') }}

	{{ Form::reset('Reset') }}
	{{ Form::submit('Signup') }}

	{{ Form::close() }}

</article>
@stop