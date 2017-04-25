<!doctype html>
<html class="no-js" lang="">
	@include( 'partials.head' )
    <body>
	@include( 'partials.nav' )
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to your assembly</h1>
        <p>Be sure to register at the nearest registration desk. They will give you a verification code that, in
		combination of the ID number used to verify your identity, you can vote for the assembly motions.</p>
      </div>
    </div>
	@if( session()->has('error_message') )
		<div class="container">
		  <div class="row">
			<div class="col-md-12">
			<div class="alert alert-danger">
				<strong>Oops!</strong> {{ session('error_message') }}
			</div>
			</div>
		  </div>
		</div>
	@endif

	@include( 'partials.footer' )
    </div> <!-- /container -->

	@include( 'partials.end' )
    </body>
</html>
