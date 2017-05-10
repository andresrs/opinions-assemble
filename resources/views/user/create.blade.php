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
					@isset($text)
						<div class="form-group">
							<p>{{ $text }}</p>
						</div>
					@endisset
					<div class="form-group">
						<label class='col-sm-3' for="name">Name:</label>
						<input id="name" name="name" type="text" required class="form-control">
					</div>
					<div class="form-group">
						<label class='col-sm-3' for="email">E-mail:</label>
						<input id="email" name="email" type="email" required class="form-control">
					</div>
					<div class="form-group">
						<label class='col-sm-3' for="password">Password:</label>
						<input id="password" name="password" type="password" required class="form-control">
					</div>
					<div class="form-group">
						<label class='col-sm-3' for="password_confirmation">Confirm password:</label>
						<input id="password_confirmation" name="password_confirmation" type="password" required class="form-control">
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-default">
								Register
							</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection
