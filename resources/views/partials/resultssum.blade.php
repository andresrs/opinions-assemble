@section('left')
	@if ( isset($all_motions) )
		<ul class='list-group'>
		@foreach ($all_motions as $m)
			<li class='list-group-item'>{{ $m->proposal_short }} <span class="badge">{{ $m->votes->count() }}</span></li>
		@endforeach
		</ul>
	@else
		Hello World!
	@endif
@endsection
