<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="{{ URL::asset('apple-touch-icon.png') }}">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/font-awesome/css/font-awesome.min.css') }}">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-theme.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">
        <script src="{{ URL::asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>
    </head>
    <body>
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
		<!--
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div>
		--><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
<!--
    <div class="jumbotron">
      <div class="container">
        <h1>Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>
-->
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

      <hr>

      <footer>
        <p>&copy; Andres Rosado-Sep&uacute;lveda 2017</p>
      </footer>
    </div> <!-- /container -->

	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="{{ URL::asset('js/vendor/jquery-3.2.1.min.js') }}"><\/script>')</script>

	<script src="{{ URL::asset('js/vendor/bootstrap.min.js') }}"></script>

	<script src="{{ URL::asset('js/plugins.js') }}"></script>
	<script src="{{ URL::asset('js/main.js') }}"></script>
    </body>
</html>
