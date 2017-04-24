@extends('layouts.app')

@section('content')
	<div class="panel-heading">Active Motion</div>
	<div class="panel-body">
		<div class="panel-body">
	<!-- Display Validation Errors -->
	@include('common.errors')
			<table class="table">
				<thead>
					<tr>
						<th colspan='2'>
							{{ $motion->proposal }}<br><br>
							<small>{{ $motion->available_until->diffForHumans() }}</small>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><b>Voted</b></td>
						<td> ?? </td>
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
