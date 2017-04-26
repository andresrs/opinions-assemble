@extends('layouts.twocol')

@include('partials.resultssum')

@include('partials.navadmin')

@section('content')
	<div class="panel-heading">Active Motion</div>
	<div class="panel-body">
		<div class="panel-body">
	<!-- Display Validation Errors -->
	@include('common.errors')
			<table class="table">
				<thead>
					<tr>
						<td colspan='2'>
							<b>{{ $motion->proposal }}</b><hr>
							<small>Available for {{ $motion->available_until->diffForHumans(null, true) }} more.</small>
						</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>Voted</b></td>
						<td> {{ $votes }} </td>
					</tr>
					<tr>
						<td><b>Registered Participants</b></td>
						<td>{{ $participants_registered }}</td>
					</tr>
					<tr>
						<td><b>Valid Participants</b></td>
						<td>{{ $participants_total }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
