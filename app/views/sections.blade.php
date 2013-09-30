@extends('includes.template')

@section('content')

	<h2>{{$section->name}}</h2>

		<article class="group">
			<h4>{{{ $section->title }}}</h4>
			<p>{{{ $section->content }}}</p>
		</article>


		{{ HTML::link('topics/'.$section->page->id, 'Go back to the\''.$section->page->name.'\' page' , array('class'=>'button'))}}

@stop