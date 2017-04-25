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
	  <a class="navbar-brand" href="#">Opinions Assemble</a>
	</div>
	@if ( !session()->has('hide_log_in') )
		<div id="navbar" class="navbar-collapse collapse">
		  <form action="{{ url('main/login') }}" class="navbar-form navbar-right" role="form" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
			  <input name='user_id' type="text" placeholder="User ID" class="form-control">
			</div>
			<div class="form-group">
			  <input name='verification_code' type="password" placeholder="Code" class="form-control">
			</div>
			<button type="submit" class="btn btn-success">Sign in</button>
		  </form>
		</div>
	@endif
  </div>
</nav>
