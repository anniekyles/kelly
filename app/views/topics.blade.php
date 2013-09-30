@extends('includes.template')

@section('content')

	<h2>{{{ $topic->name }}}</h2>
	
	<?php $oPostPaginator = $topic->posts()->paginate(6); ?>

	@foreach($oPostPaginator as $post)

		<article class="one-third column even">
			<h4>{{{ $post->title }}}</h4>
			<p>{{{ StringHelper::truncate($post->content, 300)}}} {{ HTML::link('posts/'.$post->id, 'read more') }}</p>

			<br/>
		</article>
	@endforeach


@stop