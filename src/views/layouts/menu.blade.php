@section('menu')

<div id="menu-section">
<div class="ui large inverted borderless menu">

	<a class="{{ (Request::is('admin/dashboard') ? 'active' : '') }} item" href="{{ url('admin/dashboard') }}"><i class="home basic icon"></i>Dashboard</a>

	@if($menuItems['users'])
	    <a class="{{ (Request::is('admin/users') ? 'active' : '') }} item" href="{{ url('admin/users') }}"><i class="home basic icon"></i>Users</a>
	@endif

	@if($menuItems['pages'])
		<a class="{{ (Request::is('admin/pages') ? 'active' : '') }} item" href="{{ url('admin/pages') }}"><i class="home basic icon"></i>Pages</a>
	@endif

	@if($menuItems['gallery'])
	    <a class="{{ (Request::is('admin/gallery') ? 'active' : '') }} item" href="{{ url('admin/gallery') }}"><i class="home basic icon"></i>Photo Gallery</a>
	@endif

	@foreach($customMenu as $item)
		<a class="{{ (Request::is($item['route']) ? 'active' : '') }} {{ $item['class'] }}" href="{{ url($item['route']) }}">{{ $item['text'] }}</a>
	@endforeach

</div>
</div>
@stop