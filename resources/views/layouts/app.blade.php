<!doctype html>
<html class="no-js" lang="">
	@include( 'partials.head' )
    <body>
	@include( 'partials.nav' )
	<br>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
			<div class="panel panel-primary">
				@yield('content')
			</div>
        </div>
      </div>
    </div>

	@include( 'partials.footer' )

	@include( 'partials.end' )
    </body>
</html>
