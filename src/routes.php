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
	return \View::make('backend::index');
});

Route::post('admin/login', function()
{
	$credentials = array(
		'username'	=>	Input::get('username'),
		'password'	=>	Input::get('password'),
	);

	$v = new Validators\Login;
	if($v->passes($credentials))
	{
		if (Auth::attempt($credentials))
		{
			return Redirect::intended('admin/dashboard');
		}
		return Redirect::back()->withInput()->withErrors(array('Incorrect username or password'));
  	}
   	return Redirect::back()->withInput()->withErrors($v->messages);
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
