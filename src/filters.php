<?php

/*
|--------------------------------------------------------------------------
| Package Filters
|--------------------------------------------------------------------------
|
*/

Route::filter('auth.admin', function()
{
	if ( ! Auth::isAdmin()) return Redirect::to('admin/login');
});