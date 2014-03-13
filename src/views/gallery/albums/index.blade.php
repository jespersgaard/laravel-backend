@section('content')

<h1>Albums</h1>

<div class="ui segment">
	<a class="ui labeled icon blue button" href="{{ url('admin/gallery/albums/new') }}"><i class="doc basic icon"></i>New album</a>
</div>
<table class="ui inverted table segment">
	<thead><tr>
		<th>Album ID</th>
		<th>Album name</th>
		<th>Album description</th>
	</tr></thead>
	<tbody>
		@foreach($albums as $album)
			<tr>
				<td> {{$album->album_id}} </td>
				<td> {{$album->album_name}} </td>
				<td> {{$album->album_description}} </td>
				<td>
					<a class="ui labeled icon blue button" href="{{ url('admin/gallery/albums/edit', array($album->album_id)) }}"><i class="edit basic icon"></i>Edit album</a>
				</td>
				<td class="ui buttons">
					@if(is_null($album->deleted_at))
						<a class="ui labeled icon red disable-album button" href="{{ url('admin/gallery/albums/disable', array($album->album_id)) }}"><i class="block basic icon"></i>Disable album</a>
					@else
						<a class="ui labeled icon blue enable-album button" href="{{ url('admin/gallery/albums/enable', array($album->album_id)) }}"><i class="check basic icon"></i>Enable album</a>
					@endif
					<a class="ui labeled icon red delete-album button" href="{{ url('admin/gallery/albums/delete', array($album->album_id)) }}"><i class="delete basic icon"></i>Delete album</a>
				</td>
				
			</tr>
		@endforeach
	</tbody>
</table>

@stop

@section('js')
<script type="text/javascript">
$('.ui.enable-album')
  .popup({
    content: '<p> When you disable a album, it looks like it is deleted. The only difference is that a disabled album can be restored. <br/> Click the button to bring this album back into the system.</p>'
  })
;
$('.ui.disable-album')
  .popup({
    content: '<p>When you disable a album, it looks like it is deleted. The only difference is that a disabled album can be restored. <br/> Click the button to disable the album.</p>'
  })
;
$('.ui.delete-album')
  .popup({
    content: '<p>Be careful! Once deleted, you cannot restore a album.</p>'
  })
;
</script>
@stop
@stop