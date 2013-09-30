@extends('includes.template')

@section('content')

<article>

	<h2>Create A New Post</h2>
	
	{{ Form::open(array('url' => 'posts', 'method' => 'post')) }}

	{{ Form::label('topic_id','Select a topic') }}
	{{ Form::select('topic_id',$aTopics) }}

	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', Input::old('title')) }}
	{{ $errors->first('title','<p class="error">:message</p>') }}

	{{ Form::label('content', 'Content') }}
	{{ Form::textarea('content', Input::old('content')) }}
	{{ $errors->first('content','<p class="error">:message</p>') }}


	<br class="group" />
	{{ Form::reset('Reset') }}
	{{ Form::submit('Create Post') }}

	{{ Form::close() }}

</article>
@stop