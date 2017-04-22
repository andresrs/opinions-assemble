@extends('layouts.app')

@section('content')
	<div class="panel-heading">Add Assembly Participant</div>
	<div class="panel-body">
		<div class="panel-body">
	<!-- Display Validation Errors -->
	@include('common.errors')
			<form action="{{ url('participant/store') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						<label for="name" class="col-sm-3 control-label">Name</label>

						<div class="col-sm-9">
							<input type="text" name="name" id="participant-name" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-3 control-label">E-mail</label>

						<div class="col-sm-9">
							<input type="text" name="email" id="participant-email" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<label for="user_id" class="col-sm-3 control-label">User ID</label>

						<div class="col-sm-9">
							<input type="text" name="user_id" id="participant-userid" class="form-control">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-default">
								Add Participant <i class="fa fa-plus"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection
