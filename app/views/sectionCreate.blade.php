@extends('includes.template')

@section('content')

<article>

	<h2>Create A New Section</h2>
	
	{{ Form::open(array('url' => 'sections', 'method' => 'post')) }}

	{{ Form::hidden('topic_id',1) }}

	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', Input::old('title')) }}
	{{ $errors->first('title','<p class="error">:message</p>') }}

	{{ Form::label('content', 'Content') }}
	{{ Form::textarea('content', Input::old('content')) }}
	{{ $errors->first('content','<p class="error">:message</p>') }}


	<br class="group" />
	{{ Form::reset('Reset') }}
	{{ Form::submit('Create Section') }}

	{{ Form::close() }}

</article>
@stop