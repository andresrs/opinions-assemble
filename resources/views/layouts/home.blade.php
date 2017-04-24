<!doctype html>
<html class="no-js" lang="">
	@include( 'partials.head' )
    <body>
	@include( 'partials.nav' )
	@include( 'partials.jumbotron' )
	<br>
    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-12">
			<div class="panel panel-primary">
				@yield('content')
			</div>
       </div>
      </div>

	@include( 'partials.footer' )
    </div> <!-- /container -->

	@include( 'partials.end' )
    </body>
</html>
