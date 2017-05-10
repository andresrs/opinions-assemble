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
					<li class="list-group-item">List of registered attendees</li>
					<li class="list-group-item">Motions presented and their results</li>
				</ol>
			</div>
			<div class="col-sm-9">
				<p>
					<a href=" {{ url('admin/generate') }}" class="btn btn-info" role="button">Generate Files</a>
				</p>
			</div>
			@if ( isset($file_ready) and $file_ready )
				<div class="col-sm-9">
					<p class="form-control-static">
						The output file is now ready. Be sure to download it before resetting the database for a new assembly.
					</p>
				</div>
				<div class="col-sm-9">
					<p>
						<a href=" {{ url('admin/download') }}" class="btn btn-success" role="button">Download All Files</a>
					</p>
					<p>
						<a href=" {{ url('admin/reset') }}" class="btn btn-warning" role="button">Reset Database</a>
					</p>
				</div>
			@endif
		</div>
	</div>
@endsection
