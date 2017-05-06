@section('nav-menu')
	<li><a href="{{ url('/admin') }}">Admin</a></li>
	<li><a href="{{ url('/admin/register') }}">Register Participants</a></li>
	<li><a href="{{ url('/admin/motion') }}">Add Motion</a></li>
	<li><a href="{{ url('/user/create') }}">Add User</a></li>
@endsection
