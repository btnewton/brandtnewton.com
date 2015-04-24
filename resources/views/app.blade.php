<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Afterhof</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/mystyle.css') }}" rel="stylesheet">

	<!-- Scripts -->
	<script src="/js/jquery.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-52756625-3', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ url('/') }}">Afterhof</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
					{!! (Request::url()==url().'/subjects/Finances')?'<li id="active">':'<li>'!!}<a href="{{ url('/subjects/Finances') }}">Finances</a></li>
					{!! (Request::url()==url().'/subjects/Employment')?'<li id="active">':'<li>'!!}<a href="{{ url('/subjects/Employment') }}">Employment</a></li>
					{!! (Request::url()==url().'/subjects/Education')?'<li id="active">':'<li>'!!}<a href="{{ url('/subjects/Education') }}">Education</a></li>
					{!! (Request::url()==url().'/subjects/Social Navigation')?'<li id="active">':'<li>'!!}<a href="{{ url('/subjects/Social Navigation') }}">Social Navigation</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">More <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span></a>
						<ul class="dropdown-menu sections-dropdown" role="menu">
						<span id="dropdown-subtitle">Other Sections</span>
							<li><a href="{{ url('/subjects/Health') }}">Health</a></li>
							<li><a href="{{ url('/subjects/Technical Literacy') }}">Technical Literacy</a></li>
							<li><a href="{{ url('/subjects/Dealing with the Past') }}">Dealing with the Past</a></li>
							<span id="dropdown-subtitle">About</span>
							<li><a href="/res/Policies.pdf" target="_blank">Site Policy</a></li>
						</ul>
					</li>
				</ul>

				<!-- User Navigation -->
				<ul class="nav navbar-nav navbar-right">

					<!-- Login / Register Navigaion -->
				
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Login</a></li>
						<li><a href="{{ url('/auth/register') }}"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Register</a></li>
					@else
					
						<!-- Signed In Navigation -->

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->pseudonym }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">

								<!-- Content Provider Navigation -->
								
								@if (Auth::user()->rank != 'consumer')
									<li><a href="{{ url('/posts/create') }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Post</a></li>
									<li><a href="{{ url('/users/'.Auth::user()->pseudonym) }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> Profile</a></li>
								@endif
								<li><a href="{{ url('/auth/logout') }}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')
	
</body>
</html>
