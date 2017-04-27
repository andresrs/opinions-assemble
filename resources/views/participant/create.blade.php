@extends('layouts.app')

@section('content')
	<div class="panel-heading">Add Assembly Participant</div>
	<div class="panel-body">
		<div class="panel-body">
	<!-- Display Validation Errors -->
	@include('common.errors')
			<form action="{{ url('/admin/participant/store') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						<p class='col-sm-offset-2 col-sm-10'>
							The file with the participants authorized to participate must be a comma-separated values (CSV)
							file with the following columns:
						</p><br>
					</div>
					<div class="form-group">
						<ol class="list-group col-sm-offset-3 col-sm-6">
							<li class="list-group-item">Name</li>
							<li class="list-group-item">ID to be used to validate the participant</li>
							<li class="list-group-item">E-mail of the participant</li>
						</ol>
					</div>
					<div class="form-group">
						<label class='col-sm-3' for="participants_file">Select file:</label>
						<input id="participants_file" name="participants_file" type="file" required>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-default">
								Add Participants <i class="fa fa-plus"></i>
							</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection
