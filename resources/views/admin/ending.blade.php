@extends('layouts.twocol')

@include('partials.resultssum')

@include('partials.navadmin')

@section('content')
	<div class="panel-heading">Administration Screen</div>
	<div class="panel-body">
		<div class="panel-body">
			<div class="col-sm-9">
				<p class="form-control-static">
					If the assembly ended, you can generate a zip file with the following files:
				</p>
			</div>
			<div class="col-sm-9">
				<ol class="list-group col-sm-offset-3 col-sm-6">
					<li class="list-group-item">List of registered participants</li>
					<li class="list-group-item">ID to be used to validate the participant</li>
					<li class="list-group-item">E-mail of the participant</li>
				</ol>
			</div>
			<div class="col-sm-9">
				<p>
					<a href=" {{ url('admin/generate') }}" class="btn btn-info" role="button">Generate Files</a>
				</p>
			</div>
		</div>
	</div>
@endsection
