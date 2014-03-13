@section('content')

<h1>Gallery</h1>
<div class="ui segment">
	<div class="ui buttons">
		<a class="ui labeled icon blue button" href="{{ url('admin/gallery/albums') }}"><i class="open folder basic icon"></i>All albums</a>
		<a class="ui labeled icon green button" href="{{ url('admin/gallery/albums/new') }}"><i class="folder basic icon"></i>New Album</a>
	</div>

	<div class="ui buttons">
		<a class="ui labeled icon blue button" href="{{ url('admin/gallery/photos') }}"><i class="photos basic icon"></i>All Photos</a>
		<a class="ui labeled icon green button" href="{{ url('admin/gallery/photos/new') }}"><i class="photo basic icon"></i>New Photo</a>
	</div>
</div>
@stop