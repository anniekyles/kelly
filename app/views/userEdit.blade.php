@extends('includes.template')

@section('content')

<article>
	<h2>Edit User Details</h2>

	{{ Form::model($user,array('url' => 'users/'.$user->id,'method'=>'put')) }}

	{{ Form::label('firstname', 'First Name') }}
	{{ Form::text('firstname') }}
	{{ $errors->first('firstname','<p class="error">:message</p>') }}

	{{ Form::label('lastname', 'Last Name') }}
	{{ Form::text('lastname') }}
	{{ $errors->first('lastname','<p class="error">:message</p>') }}

	{{ Form::label('email', 'Email') }}
	{{ Form::text('email') }}
	{{ $errors->first('email','<p class="error">:message</p>') }}

	{{Form::submit('Save Changes') }}

	{{ Form::close() }}

</article>
@stop