<?php namespace JeroenG\LaravelBackend\Controllers;

class GalleryController extends BaseController {

	public function showIndex()
	{
		$this->layout->content = \View::make('backend::gallery.index');
	}

	public function showAlbums()
	{
		$albums = 
		$this->layout->content = \View::make('backend::gallery.albums.index')->with('albums', $albums);
	}

	public function showNewAlbum()
	{
		$this->layout->content = \View::make('backend::gallery.albums.new');
	}

	public function postNewAlbum()
	{
		# code...
	}

	public function showEditAlbum($albumId)
	{
		$album = 
		$this->layout->content = \View::make('backend::gallery.albums.edit')->with('album', $album);
	}

	public function postEditAlbum($albumId)
	{
		# code...
	}

	public function doAlbumDisable($albumId)
	{
		# code...
	}

	public function doAlbumEnable($albumId)
	{
		# code...
	}

	public function doAlbumDelete($albumId)
	{
		# code...
	}

	public function showPhotos()
	{
		$this->layout->content = \View::make('backend::gallery.photos.index');
	}

	public function showAlbumPhotos($albumId)
	{
		$data = array(
			'album'  =>
			'photos' =>
		);
		$this->layout->content = \View::make('backend::gallery.album.photos')->with($data);
	}

	public function showNewPhoto()
	{
		$this->layout->content = \View::make('backend::gallery.photos.new');
	}

	public function postNewPhoto()
	{
		# code...
	}

	public function showEditPhoto($photoId)
	{
		$this->layout->content = \View::make('backend::gallery.photos.edit');
	}

	public function postEditPhoto($photoId)
	{
		# code...
	}

	public function doPhotoDisable($photoId)
	{
		# code...
	}

	public function doPhotoEnable($photoId)
	{
		# code...
	}

	public function doPhotoDelete($photoId)
	{
		# code...
	}
}