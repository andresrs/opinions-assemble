@extends('layouts.app')

@section('content')
	<div class="panel-heading">Motion for Assembly Consideration</div>
	<div class="panel-body">
		<div class="panel-body">
	<!-- Display Validation Errors -->
	@include('common.errors')
			<form action="{{ url('vote/store') }}" method="POST" class="form-horizontal">
				{{ csrf_field() }}
				<fieldset>
					<div class="form-group">
						<label for="proposal" class="col-sm-3 control-label">Motion</label>

						<div class="col-sm-9">
							<p class="form-control-static">
								{{ $motion->proposal }}
							</p>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9 btn-group colors" data-toggle="buttons">
							<label class="btn btn-success col-sm-2">
								<input type="radio" name="answer" value="1" autocomplete="off" required> Yes
							</label>
							<label class="btn btn-danger col-sm-2">
								<input type="radio" name="answer" value="0" autocomplete="off" required> No
							</label>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-9">
							<button type="submit" class="btn btn-default">
								Vote
							</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>
@endsection
