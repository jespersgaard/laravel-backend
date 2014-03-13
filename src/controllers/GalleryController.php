<?php namespace JeroenG\LaravelBackend\Controllers;

class GalleryController extends BaseController {

	public function showIndex()
	{
		$this->layout->content = \View::make('backend::gallery.index');
	}

	public function showAlbums()
	{
		$this->layout->content = \View::make('backend::gallery.albums.index');
	}
}