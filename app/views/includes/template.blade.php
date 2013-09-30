<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Blog</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
	{{HTML::style("stylesheets/reset.css")}}
	{{HTML::style("stylesheets/styles.css")}}

<!-- 	<link rel="stylesheet" href="stylesheets/skeleton.css">
	<link rel="stylesheet" href="stylesheets/layout.css"> -->

	<!-- Fonts
  ================================================== -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Ubuntu' rel='stylesheet' type='text/css'>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

</head>
<body>

	<div class="container">
	<h1>Kelly Workshop</h1>
	<h2>for all your vehicle service and maintainance requirements</h2>
	<h2>Mt Albert, Auckland</h2>
	<h2>Ph 09 555 5555</h2>

	<nav>
		@foreach(Topic::all() as $topic)
		<li>{{ HTML::link('topics/'.$topic->id, $topic->name) }}</li>
		@endforeach
	</nav>

	@yield('content')



	@if(Auth::check())
		{{HTML::link('logout','Log Out', array('class'=>'button right'))}}
		{{HTML::link('users/'.Auth::user()->id,'Your Details', array('class'=>'button right'))}}
		@if(Auth::user()->admin === 1)
			{{HTML::link('posts/create','Create a New Post', array('class'=>'button right'))}}
			{{HTML::link('topics/create','Create a New Topic', array('class'=>'button right'))}}
		@endif
	@else
		{{HTML::link('login','Admin', array('class'=>''))}}
	@endif
	</div><!-- container -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	{{ HTML::script("javascript.js") }}

<!-- End Document
================================================== -->
</body>
</html>