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
	Route::get('users/new', 'JeroenG\LaravelBackend\Controllers\UsersController@showNew');
	Route::post('users/new', 'JeroenG\LaravelBackend\Controllers\UsersController@postNew');
	Route::get('users/edit/{id}', 'JeroenG\LaravelBackend\Controllers\UsersController@showEdit');
	Route::post('users/edit/{id}', 'JeroenG\LaravelBackend\Controllers\UsersController@postEdit');
	Route::get('users/disable/{id}', 'JeroenG\LaravelBackend\Controllers\UsersController@doDisable');
	Route::get('users/enable/{id}', 'JeroenG\LaravelBackend\Controllers\UsersController@doEnable');
	Route::get('users/delete/{id}', 'JeroenG\LaravelBackend\Controllers\UsersController@doDelete');

	Route::get('pages', 'JeroenG\LaravelBackend\Controllers\PagesController@showIndex');
	Route::get('pages/new', 'JeroenG\LaravelBackend\Controllers\PagesController@showNew');
	Route::post('pages/new', 'JeroenG\LaravelBackend\Controllers\PagesController@postNew');
	Route::get('pages/edit/{id}', 'JeroenG\LaravelBackend\Controllers\PagesController@showEdit');
	Route::post('pages/edit/{id}', 'JeroenG\LaravelBackend\Controllers\PagesController@postEdit');
	Route::get('pages/disable/{id}', 'JeroenG\LaravelBackend\Controllers\PagesController@doDisable');
	Route::get('pages/enable/{id}', 'JeroenG\LaravelBackend\Controllers\PagesController@doEnable');
	Route::get('pages/delete/{id}', 'JeroenG\LaravelBackend\Controllers\PagesController@doDelete');

	Route::get('activity/clean/{number?}', 'JeroenG\LaravelBackend\Controllers\ActivityController@doClean');
	Route::get('activity/{number?}', 'JeroenG\LaravelBackend\Controllers\ActivityController@showIndex');

	Route::group(array('prefix' => 'gallery'), function()
	{
		Route::get('/', 'JeroenG\LaravelBackend\Controllers\GalleryController@showIndex');
		Route::get('albums', 'JeroenG\LaravelBackend\Controllers\GalleryController@showAlbums');
		Route::get('albums/new', 'JeroenG\LaravelBackend\Controllers\GalleryController@showNewAlbum');
		Route::post('albums/new', 'JeroenG\LaravelBackend\Controllers\GalleryController@postNewAlbum');
		Route::get('albums/edit/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@showEditAlbum');
		Route::post('albums/edit/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@postEditAlbum');
		Route::get('albums/disable/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@doAlbumDisable');
		Route::get('albums/enable/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@doAlbumEnable');
		Route::get('albums/delete/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@doAlbumDelete');

		Route::get('photos', 'JeroenG\LaravelBackend\Controllers\GalleryController@showPhotos');
		Route::get('album/photos/{albumId}', 'JeroenG\LaravelBackend\Controllers\GalleryController@showAlbumPhotos');
		Route::get('photos/new', 'JeroenG\LaravelBackend\Controllers\GalleryController@showNewPhoto');
		Route::post('photos/new', 'JeroenG\LaravelBackend\Controllers\GalleryController@postNewPhoto');
		Route::get('photos/edit/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@showEditPhoto');
		Route::post('photos/edit/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@postEditPhoto');
		Route::get('photos/disable/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@doPhotoDisable');
		Route::get('photos/enable/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@doPhotoEnable');
		Route::get('photos/delete/{id}', 'JeroenG\LaravelBackend\Controllers\GalleryController@doPhotoDelete');
	});

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
