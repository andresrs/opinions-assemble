@extends('layouts.twocol')

@include('partials.resultssum')

@section('content')
	<div class="panel-heading">Submit Motion for Assembly Consideration</div>
	<div class="panel-body">
		<div class="panel-body">
	<!-- Display Validation Errors -->
	@include('common.errors')
			<form action="{{ url('motion/store') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						<label for="proposal_short" class="col-sm-3 control-label">Short Summary of Motion</label>

						<div class="col-sm-6">
							<input type="text" id='proposal_short' name='proposal_short' class="form-control" required value='{{ old('proposal_short') }}'>
						</div>
					</div>

					<div class="form-group">
						<label for="proposal" class="col-sm-3 control-label">Motion</label>

						<div class="col-sm-6">
							<textarea rows='5' id='proposal' name='proposal' class="form-control" required>{{ old('proposal') }}</textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<button type="submit" class="btn btn-default">
								Submit Motion to Vote
							</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection
