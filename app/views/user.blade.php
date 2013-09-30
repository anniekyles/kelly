@extends('includes.template')

@section('content')



	<article class="column">
	<h2>{{$user->firstname.' '.$user->lastname }}</h2>		
	<h5>Email:</h5>
		<p>{{ $user->email }}</p>

		{{HTML::link('users/'.$user->id.'/edit','Edit Details', array('class'=>'button'))}}

	</article>

@stop