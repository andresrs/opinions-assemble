@extends('layouts.twocol')

@include('partials.usermenu')

@include('partials.navadmin')

@section('content')
	<div class="panel-heading">Register to participate in assembly</div>
	<div class="panel-body">
		<div class="panel-body">
			@include('common.errors')
			<form action="{{ url('/user/settings') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						<label class='col-sm-3' for="user_code">User ID:</label>
						<input id="user_code" name="user_code" type="text" required class="form-control">
					</div>
					<div class="form-group">
						<label class='col-sm-3' for="verification_code">Code:</label>
						<input id="verification_code" name="verification_code" type="text" required class="form-control">
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-default">
								Register
							</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
@endsection
