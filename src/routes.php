<?php

/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
| Here is where all of the routes for the package are registered.
|
*/
View::composer('backend::layouts.master', function($view)
{
    $view->nest('menu', 'backend::layouts.menu');
    $view->nest('header', 'backend::layouts.header');
});

View::composer('backend::layouts.menu', function($view)
{
	$view->with(array('menuItems' => \Config::get('backend::menuItems')));
	$view->with(array('customMenu' => \Config::get('backend::customMenu')));
});

Route::get('admin', function()
{
	return \View::make('backend::index');
});

Route::get('admin/login', function()
{
	if (Auth::attempt(array('username' => 'jeroen', 'password' => 'secret')))
	{
	    return Redirect::intended('admin/dashboard');
	}
	else
	{
		return "not logged in";
	}
});

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
	Route::get('dashboard', 'JeroenG\LaravelBackend\Controllers\DashboardController@showIndex');

	Route::get('logout', function()
	{
		Auth::logout();
		return Redirect::to('admin');
	});
});
