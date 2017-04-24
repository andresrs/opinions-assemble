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
					<tr class="active">
						<td><b>Voted</b></td>
						<td>{{ $motion->available_until }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
