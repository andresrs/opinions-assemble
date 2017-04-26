@section('left')
	@if ( isset($all_motions) )
		<div class="list-group list-group-root well">
		@foreach ($all_motions as $m)
			<a href="#motion-{{ $m->id }}" class="list-group-item {{ ($m->votes->where('vote_id', '=', '1')->count() > $m->votes->where('vote_id', '=', '0')->count()) ? 'list-group-item-success' : 'list-group-item-danger' }}"
			data-toggle="collapse">{{ $m->proposal_short }}
			<span class="badge">{{ $m->votes->where('vote_id', '=', '1')->count() }} - {{ $m->votes->where('vote_id', '=', '0')->count() }}</span>
			</a>
			@if ($m->available_until->timestamp <= time())
				<div class="list-group collapse" id="motion-{{ $m->id }}">
					<a href="#motion-{{ $m->id }}-1" class="list-group-item" data-toggle="collapse">
						Yes <span class="badge">{{ $m->votes->where('vote_id', '=', '1')->count() }}</span>
					</a>
					<a href="#motion-{{ $m->id }}-0" class="list-group-item" data-toggle="collapse">
						No <span class="badge">{{ $m->votes->where('vote_id', '=', '0')->count() }}</span>
					</a>
				</div>
			@endif
		@endforeach
		</div>
	@else
		Hello World!
	@endif
@endsection
