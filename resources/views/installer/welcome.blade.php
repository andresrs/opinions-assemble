@extends('layouts.app')

@section('content')
	<div class="panel-heading">Register</div>
	<div class="panel-body">
		<h2>Opinions Assemble</h2>
		<p>Welcome to <i><a href="">Opinions Assemble</a></i>, a service to handle the registration and voting for motions during an assembly.</p>
		<p><a href=" {{ url('install/user') }}" class="btn btn-primary" role="button">Start</a></p>
	</div>
@endsection
