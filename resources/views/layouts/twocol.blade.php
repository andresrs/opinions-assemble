<!doctype html>
<html class="no-js" lang="">
	@include( 'partials.head' )
    <body>
	@include( 'partials.nav' )
	<br>
    <div class="container">
      <div class="row">
        <div class="col-md-9 col-sm-push-3">
			<div class="panel panel-primary">
				@yield('content')
			</div>
       </div>
        <div class="col-md-3 col-sm-pull-9">
			<div class="panel panel-primary">
				@yield('left')
			</div>
       </div>
      </div>

	@include( 'partials.footer' )
    </div>

	@include( 'partials.end' )
    </body>
</html>
