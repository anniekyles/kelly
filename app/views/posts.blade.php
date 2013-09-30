@extends('includes.template')

@section('content')

	<h2>{{$post->name}}</h2>

		<article class="group">
			<h4>{{{ $post->title }}}</h4>
			<p>{{{ $post->content }}}</p>
		</article>

		<?php 
			if(count($post->comments)>0){
				echo '<br/><h4>Comments</h4>';
			}
		?>
		
		@foreach($post->comments as $comment)
			<article class="group">
				<h5>{{{ $comment->title }}}</h5>
				<p>{{{ $comment->content }}}</p>
				<p>{{{ $comment->user->firstname.' '.$comment->user->lastname }}}</p>
			</article>
		@endforeach

		@if(!Auth::guest())

			<article class="group">
				<h4>Add a comment</h4>
				{{ Form::model($post->comments,array('url' => 'comments','method'=>'post')) }}

				{{ Form::label('title', 'Title') }}
				{{ Form::text('title') }}
				{{ $errors->first('title','<p class="error">:message</p>') }}

				{{ Form::label('content', 'Comment') }}
				{{ Form::textarea('content') }}
				{{ $errors->first('content','<p class="error">:message</p>') }}

				{{ Form::hidden('post_id', $post->id)}}
				{{ Form::hidden('user_id', Auth::user()->id)}}

				{{Form::submit('Submit comment') }}

				{{ Form::close() }}
			</article>

		@endif

		{{ HTML::link('topics/'.$post->topic->id, 'Go back to the\''.$post->topic->name.'\' topic' , array('class'=>'button'))}}

@stop