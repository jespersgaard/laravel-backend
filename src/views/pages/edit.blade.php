@section('content')

@include('backend::partials.messages')

  <h1>Edit page</h1>

{{ Form::model($page, array('url' => array('admin/pages/edit', $page->page_id), 'class' => 'ui form segment')) }}

    <div class="field">
    {{ Form::label('page_title', 'Title') }}
    {{ Form::text('page_title'); }}
  </div>

  <div class="field">
    {{ Form::label('page_slug', 'Custom slug (optional)') }}
    {{ Form::text('page_slug'); }}
  </div>

  <div class="field">
    {{ Form::label('page_content', 'Content') }}
    {{ Form::textarea('page_content') }}
  </div>

  <div class="ui buttons">
    <a class="ui button" href="{{ url('admin/pages') }}">Cancel</a>
    <div class="or"></div>
    {{ Form::submit("Submit", array('class' => 'ui positive submit button')) }}
  </div>
{{ Form::close() }}

@stop