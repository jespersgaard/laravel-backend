<?php namespace JeroenG\LaravelBackend\Controllers;

use JeroenG\LaravelPages\Page;

class PagesController extends BaseController {

	public function showIndex()
	{
		$pages = Page::withTrashed()->get();
		$this->layout->content = \View::make('backend::pages.index')->with('pages', $pages);
	}

	public function showNew()
	{
		$this->layout->content = \View::make('backend::pages.new');
	}

	public function postNew()
	{
		$title = \Input::get('title');
		$content = \Input::get('content');
		$slug = \Input::get('slug');
		if(empty($slug)) $slug = null;

		$v = new \Validators\NewPage;
		if($v->passes($input))
		{
			if (\LPages::addPage($title, $content, $slug))
			{
				return \Redirect::to('admin/pages');
			}
			return \Redirect::back()->withInput()->withErrors(array('Unable to create a new page'));
	  	}
	   	return \Redirect::back()->withInput()->withErrors($v->messages);
	}

	public function showEdit($pageId)
	{
		$page = Page::find($pageId);
        if (is_null($page))
        {
            return Redirect::to('admin/pages');
        }

		$this->layout->content = \View::make('backend::pages.edit')->with('page', $page);
	}

	public function postEdit($pageId)
	{
		$pagetitle = \Input::get('title');
		$content = \Input::get('content');
		$slug = \Input::get('slug');

		$v = new \Validators\EditPage;
		if($v->passes($input))
		{
			if (\LPages::updatePage($pageId, $title, $content, $slug))
			{
				return \Redirect::to('admin/pages');
			}
			return \Redirect::back()->withInput()->withErrors(array('Unable to update the page'));
	  	}
	   	return \Redirect::back()->withInput()->withErrors($v->messages);
	}

	public function doDisable($pageId)
	{
		\LPages::deletePage($pageId, false);
		return \Redirect::back();
	}

	public function doEnable($pageId)
	{
		\LPages::restorePage($pageId);
		return \Redirect::back();
	}

	public function doDelete($pageId)
	{
		\LPages::deletePage($pageId, true);
		return \Redirect::back();
	}
}