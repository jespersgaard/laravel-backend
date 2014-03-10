@section('content')

@include('backend::partials.messages')

  <h1>Edit user</h1>

{{ Form::model($user, array('url' => array('admin/users/edit', $user->id), 'class' => 'ui form segment')) }}

    <div class="field">
    {{ Form::label('username', 'Username') }}
    {{ Form::text('username'); }}
  </div>

  <div class="field">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email'); }}
  </div>

  <div class="field">
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
  </div>

  <div class="ui buttons">
    <a class="ui button" href="{{ url('admin/users') }}">Cancel</a>
    <div class="or"></div>
    {{ Form::submit("Submit", array('class' => 'ui positive submit button')) }}
  </div>
{{ Form::close() }}

@stop