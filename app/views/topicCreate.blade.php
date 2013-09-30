@extends('includes.template')

@section('content')

<article>

	<h2>Create A New Topic</h2>
	
	{{ Form::open(array('url' => 'topics', 'method' => 'post')) }}

	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', Input::old('name')) }}
	{{ $errors->first('name','<p class="error">:message</p>') }}

	<br class="group" />
	{{ Form::reset('Reset') }}
	{{ Form::submit('Create Topic') }}

	{{ Form::close() }}

</article>
@stop