<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="{{ url('/') }}">Opinions Assemble</a>
	</div>
	<ul class="nav navbar-nav">
		@yield('nav-menu')
	</ul>
	@if ( auth()->check() )
		<div id="navbar" class="navbar-collapse collapse navbar-right">
			<ul class="nav navbar-nav">
				<li><a href='{{ url('/user/settings') }}'>Welcome, {{ auth()->user()->name }} <i class="fa fa-cog" aria-hidden="true"></i></a></li>
			</ul>
			<a href="{{ url('/admin/logout') }}" class="btn btn-danger" role="button">Sign out</a>
		</div>
	@elseif ( session()->has('user_code') )
		<div id="navbar" class="navbar-collapse collapse navbar-right">
			<ul class="nav navbar-nav">
			<li><a>Welcome, {{ \App\Participant::getUser(session()->get('user_code'))->first()->name }}</a></li>
			</ul>
			<a href="{{ url('/main/logout') }}" class="btn btn-danger" role="button">Sign out</a>
		</div>
	@else
		<div id="navbar" class="navbar-collapse collapse navbar-right">
			<a href="{{ url('/main/login') }}" class="btn btn-success" role="button">Sign in</a>
		</div>
	@endif
  </div>
</nav>
