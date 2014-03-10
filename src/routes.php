<?php

/*
|--------------------------------------------------------------------------
| Package Routes
|--------------------------------------------------------------------------
|
| Here is where all of the routes for the package are registered.
|
*/

				/*	View composers */
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

				/* General routes */
Route::get('admin', function()
{
	return \View::make('backend::index');
});

				/* Login routes */
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

				/* Backend routes */
Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
	Route::get('dashboard', 'JeroenG\LaravelBackend\Controllers\DashboardController@showIndex');

	Route::get('users', 'JeroenG\LaravelBackend\Controllers\UsersController@showIndex');

	Route::get('pages', 'JeroenG\LaravelBackend\Controllers\PagesController@showIndex');

	Route::get('activity', 'JeroenG\LaravelBackend\Controllers\ActivityController@showIndex');

	Route::get('gallery', 'JeroenG\LaravelBackend\Controllers\GalleryController@showIndex');

	Route::get('logout', function()
	{
		Auth::logout();
		return Redirect::to('admin');
	});
});

				/* This is for the custom menu items set in the config.php */
$menuItems = \Config::get('backend::customMenu');
foreach($menuItems as $item)
{
	Route::get($item['route'], $item['action']);
}
