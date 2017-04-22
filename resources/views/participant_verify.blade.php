@extends('layouts.app')

@section('content')
	<div class="panel-heading">
		Search for participants
	</div>
	<form action="{{ url('participant_verify') }}" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel-body">
			<!-- Display Validation Errors -->
			@include('common.errors')

			<div class="form-group">
				<label for="user_id" class="col-sm-3 control-label">User ID</label>

				<div class="col-sm-6">
					<input type="text" name="user_id" id="participant-userid" class="form-control">
				</div>
			</div>

			@if (isset($search_id))
			<hr>
			<h4>
				Searching for {{ $search_id }}
			</h4>
				@if (isset($participant))
				<table class="table table-striped">
					<thead>
						<th>Name</th>
						<th>E-mail</th>
						<th>Code</th>
					</thead>
					<tbody>
						<tr>
							<td class="table-text">
								{{ $participant->name }}
							</td>
							<td class="table-text">
								{{ $participant->email }}
							</td>
							<td class="table-text">
								{{ $participant->code }}
							</td>
						</tr>
					</tbody>
				</table>
				@else
				<div class="alert alert-danger">
					User not found.
				</div>
				@endif
			@endif
		</div>
		<div class="panel-footer">
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-default">
						<i class="fa fa-plus"></i> Search
					</button>
				</div>
			</div>
		</div>
	</form>
@endsection
