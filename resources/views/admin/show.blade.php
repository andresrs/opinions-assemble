@extends('layouts.twocol')

@include('partials.resultssum')

@include('partials.navadmin')

@section('content')
	<div class="panel-heading">Administration Screen</div>
	<div class="panel-body">
		<div class="panel-body">
			<div class="col-sm-9">
				<p class="form-control-static">
					Use the menu above to register participants and add motions for the assembly consideration.
				</p>
			</div>
		</div>
	</div>
@endsection
