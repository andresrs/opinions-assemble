@extends('layouts.twocol')

@include('partials.resultssum')

@include('partials.navadmin')

@section('content')
	<div class="panel-heading">
		Search for participants
	</div>
	<div class="panel-body">
		<form action="{{ url('admin/verify') }}" method="POST" class="form-horizontal">
			{{ csrf_field() }}
			<!-- Display Validation Errors -->
			@include('common.errors')

			<div class="form-group">
				<label for="user_code" class="col-sm-3 control-label">User ID</label>

				<div class="col-sm-6">
					<input type="text" name="user_code" id="participant-userid" class="form-control" value="{{ old('user_code') }}">
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-6">
					<button type="submit" class="btn btn-default">
						Search <i class="fa fa-search"></i>
					</button>
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
								{{ $participant->verification_code }}
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
		</form>
	</div>
@endsection
