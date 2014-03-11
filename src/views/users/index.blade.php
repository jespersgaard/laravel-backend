@section('content')

@if(class_exists('LPages'))
	<?php	if(LPages::pageExists('dashboard')) LPages::getPage('dashboard'); ?>
@else
	<h1>Users</h1>
	<div class="ui segment">
		<a class="ui labeled icon blue button" href="{{ url('admin/users/new') }}"><i class="add user basic icon"></i>New user</a>
	</div>
	<table class="ui inverted table segment">
		<thead><tr>
			<th>User ID</th>
			<th>Username</th>
			<th>Last updated</th>
			<th>Edit</th>
			<th>Disable or Delete</th>
		</tr></thead>
		<tbody>
			@foreach($users as $user)
				<tr>
					<td> {{$user->id}} </td>
					<td> {{$user->username}} </td>
					<td> {{$user->updated_at}} </td>
					<td>
						<a class="ui labeled icon blue button" href="{{ url('admin/users/edit', array($user->id)) }}"><i class="edit basic icon"></i>Edit user</a>
					</td>
					<td class="ui buttons">
						@if(is_null($user->deleted_at))
							<a class="ui labeled icon red disable-user button" href="{{ url('admin/users/disable', array($user->id)) }}"><i class="block basic icon"></i>Disable user</a>
						@else
							<a class="ui labeled icon blue enable-user button" href="{{ url('admin/users/enable', array($user->id)) }}"><i class="check basic icon"></i>Enable user</a>
						@endif
						<a class="ui labeled icon red delete-user button" href="{{ url('admin/users/delete', array($user->id)) }}"><i class="delete basic icon"></i>Delete user</a>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

@stop

@section('js')
<script type="text/javascript">
$('.ui.enable-user')
  .popup({
    content: '<p> When you disable a user, it looks like it is deleted. The only difference is that a disabled user can be restored. <br/> Click the button to bring this user back into the system.</p>'
  })
;
$('.ui.disable-user')
  .popup({
    content: '<p>When you disable a user, it looks like it is deleted. The only difference is that a disabled user can be restored. <br/> Click the button to disable the user.</p>'
  })
;
$('.ui.delete-user')
  .popup({
    content: '<p>Be careful! Once deleted, you cannot restore a user.</p>'
  })
;
</script>
@stop