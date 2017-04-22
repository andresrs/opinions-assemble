@extends('layouts.app')

@section('content')
	<div class="panel-heading">Add Assembly Participant</div>
	<form action="{{ url('participant') }}" method="POST" class="form-horizontal">
		{{ csrf_field() }}

		<fieldset>
			<div class="panel-body">
<!-- Display Validation Errors -->
@include('common.errors')
				<div class="form-group">
					<label for="name" class="col-sm-3 control-label">Name</label>

					<div class="col-sm-6">
						<input type="text" name="name" id="participant-name" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="col-sm-3 control-label">E-mail</label>

					<div class="col-sm-6">
						<input type="text" name="email" id="participant-email" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label for="user_id" class="col-sm-3 control-label">User ID</label>

					<div class="col-sm-6">
						<input type="text" name="user_id" id="participant-userid" class="form-control">
					</div>
				</div>
			</div>
			<div class="panel-footer">
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-6">
						<button type="submit" class="btn btn-default">
							<i class="fa fa-plus"></i> Add Participant
						</button>
					</div>
				</div>
		    </div>
		</fieldset>
	</form>
@endsection
