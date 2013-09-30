@extends('includes.template')

@section('content')

	<h2>{{{ $page->title }}}</h2>

	@foreach($page)

		<article class="">
			<h4>{{{ $page->title }}}</h4>
			<p>{{{ $page->content }}} {{ HTML::link('posts/'.$page->id, 'read more') }}</p>

			<br/>
		</article>
	@endforeach


@stop