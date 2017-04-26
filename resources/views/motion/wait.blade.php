@extends('layouts.twocol')

@include('partials.resultssum')

@section('content')
	<div class="panel-heading">Motion for Assembly Consideration</div>
	<div class="panel-body">
		<div class="panel-body">
			<div class="col-sm-9">
				<p class="form-control-static">
					{{ $message }}
				</p>
			</div>
		</div>
	</div>
@endsection
