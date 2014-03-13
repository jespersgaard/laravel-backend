@section('content')

<h1>Activity Centre</h1>
<div class="ui segment">
	<p>Below are the {{$number}} latest activity logs shown. To change this amount, simply add it to the url (like this: <code>/activity/25</code>).</p>
	<p>All data is shown: the id, message, date of creation and possible context.</p>
	<p><a class="ui delete-logs small labeled icon red button" href="{{ url('admin/activity/clean/30') }}"><i class="delete basic icon"></i>Delete logs</a></p>
</div>
<div class="ui segment">
	<div class="ui relaxed divided list">
		@foreach($logs as $log)
		<div class="item">
			<i class="right triangle basic icon"></i>
			<div class="content">
				<div class="header">{{ $log['id'] }}. {{ $log['message'] }}</div>
				Created {{ $log['created_at']->format('Y, F jS, H:i:s') }}
				<p class="description">
					<?php print(json_encode($log['context'])) ?>
				</p>
			</div>
		</div>
		@endforeach
	</div>
</div>
@stop

@section('js')
<script type="text/javascript">
$('.ui.delete-logs')
  .popup({
    content: '<p> This deletes all logs, but preserves those created the last 30 days. </p>'
  })
;
</script>
@stop