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
							<div class="ui labeled icon red disable-user button"><i class="block basic icon"></i>Disable user</div>
						@else
							<div class="ui labeled icon blue enable-user button"><i class="check basic icon"></i>Enable user</div>
						@endif
						<div class="ui labeled icon red delete-user button"><i class="delete basic icon"></i>Delete user</div>
					</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

<div class="ui small disable-user modal">
  <i class="close icon"></i>
  <div class="header">
    Disable user
  </div>
  <div class="content">
  	<p>test</p>
  </div>
  <div class="actions">
    <div class="ui buttons">
      <div class="ui button">Cancel</div>
      <div class="or"></div>
      <div class="ui negative button">Disable</div>
    </div>
  </div>
</div>

<div class="ui small enable-user modal">
  <i class="close icon"></i>
  <div class="header">
    Enable user
  </div>
  <div class="content">
  	<p>test</p>
  </div>
  <div class="actions">
    <div class="ui buttons">
      <div class="ui button">Cancel</div>
      <div class="or"></div>
      <div class="ui positive button">Enable</div>
    </div>
  </div>
</div>

<div class="ui small delete-user modal">
  <i class="close icon"></i>
  <div class="header">
    Delete user
  </div>
  <div class="content">
  	<p>test</p>
  </div>
  <div class="actions">
    <div class="ui buttons">
      <div class="ui button">Cancel</div>
      <div class="or"></div>
      <div class="ui negative button">Delete</div>
    </div>
  </div>
</div>

@stop

@section('js')
<script type="text/javascript">
$('.ui.disable-user.modal')
  .modal('attach events', '.disable-user.button', 'show')
;
$('.ui.enable-user.modal')
  .modal('attach events', '.enable-user.button', 'show')
;
$('.ui.delete-user.modal')
  .modal('attach events', '.delete-user.button', 'show')
;
</script>
@stop