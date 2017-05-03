@extends('layouts.app')

@section('content')
	<div class="panel-heading">Register</div>
	<div class="panel-body">
		<div class="panel-body">
			@include('common.errors')
			@isset($loginUrl)
				<form action="{{ url($loginUrl) }}" method="POST" class="form-horizontal">
			@else
				<form action="{{ url('/user/store') }}" method="POST" class="form-horizontal">
			@endisset
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						@isset($loginName)
							<label class='col-sm-3' for="{{ $loginField }}">{{ $loginName }}:</label>
							<input id="{{ $loginField }}" name="{{ $loginField }}" type="text" required class="form-control">
						@else
							<label class='col-sm-3' for="email">E-mail:</label>
							<input id="email" name="email" type="email" required class="form-control">
						@endisset
					</div>
					<div class="form-group">
						@isset($passName)
							<label class='col-sm-3' for="{{ $passField }}">{{ $passName }}:</label>
							<input id="{{ $passField }}" name="{{ $passField }}" type="password" required class="form-control">
						@else
							<label class='col-sm-3' for="password">Password:</label>
							<input id="password" name="password" type="password" required class="form-control">
						@endisset
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-success">
								Sign In <i class="fa fa-sign-in" aria-hidden="true"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection
