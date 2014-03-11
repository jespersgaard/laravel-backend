@section('content')

<h1>Pages</h1>

<div class="ui segment">
	<a class="ui labeled icon blue button" href="{{ url('admin/pages/new') }}"><i class="doc basic icon"></i>New page</a>
</div>
<table class="ui inverted table segment">
	<thead><tr>
		<th>Page Title</th>
		<th>Slug</th>
		<th>Last updated</th>
		<th>Edit</th>
		<th>Disable or Delete</th>
	</tr></thead>
	<tbody>
		@foreach($pages as $page)
			<tr>
				<td> {{$page->page_title}} </td>
				<td> {{$page->page_slug}} </td>
				<td> {{$page->updated_at}} </td>
				<td>
					<a class="ui labeled icon blue button" href="{{ url('admin/pages/edit', array($page->page_id)) }}"><i class="edit basic icon"></i>Edit page</a>
				</td>
				<td class="ui buttons">
					@if(is_null($page->deleted_at))
						<a class="ui labeled icon red disable-page button" href="{{ url('admin/pages/disable', array($page->page_id)) }}"><i class="block basic icon"></i>Disable page</a>
					@else
						<a class="ui labeled icon blue enable-page button" href="{{ url('admin/pages/enable', array($page->page_id)) }}"><i class="check basic icon"></i>Enable page</a>
					@endif
					<a class="ui labeled icon red delete-page button" href="{{ url('admin/pages/delete', array($page->page_id)) }}"><i class="delete basic icon"></i>Delete page</a>
				</td>
				
			</tr>
		@endforeach
	</tbody>
</table>

@stop

@section('js')
<script type="text/javascript">
$('.ui.enable-page')
  .popup({
    content: '<p> When you disable a page, it looks like it is deleted. The only difference is that a disabled page can be restored. <br/> Click the button to bring this page back into the system.</p>'
  })
;
$('.ui.disable-page')
  .popup({
    content: '<p>When you disable a page, it looks like it is deleted. The only difference is that a disabled page can be restored. <br/> Click the button to disable the page.</p>'
  })
;
$('.ui.delete-page')
  .popup({
    content: '<p>Be careful! Once deleted, you cannot restore a page.</p>'
  })
;
</script>
@stop
@stop