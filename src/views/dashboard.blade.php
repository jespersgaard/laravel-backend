@section('content')

@if(class_exists('LPages') and LPages::pageExists('dashboard'))
	<?php $page = LPages::getPage('dashboard'); ?>
	<h1>{{ $page['page_title'] }}</h1>
	<p class="ui segment">{{ $page['page_content'] }}</p>
@else
	<h1>Dashboard</h1>
	<p class="ui segment">Welcome to the dashboard.</p>
	<p class="ui segment">You can override this text by using the JeroenG\LaravelPages package or publishing the package views (php artisan view:publish jeroen-g/laravel-backend) and edit the dashboard.blade.php file.</p>
@endif
@stop