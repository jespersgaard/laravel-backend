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
		$input = array(
			'page_title' => \Input::get('page_title'),
			'page_content' => \Input::get('page_content'),
			'page_slug' => \Input::get('page_slug')
		);
		if(empty($input['slug'])) $input['slug'] = null;
		
		$v = new \Validators\NewPage;
		if($v->passes($input))
		{
			if (\LPages::addPage($input['page_title'], $input['page_content'], $input['page_slug']))
			{
				\Activity::log('A new page has been created', array('created' => $input['page-slug'], 'by' => \Auth::user()->id));
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
            return \Redirect::to('admin/pages');
        }

		$this->layout->content = \View::make('backend::pages.edit')->with('page', $page);
	}

	public function postEdit($pageId)
	{
		$input = array(
			'page_title' => \Input::get('page_title'),
			'page_content' => \Input::get('page_content'),
			'page_slug' => \Input::get('page_slug')
		);

		$v = new \Validators\EditPage;
		if($v->passes($input))
		{
			if (\LPages::updatePage($pageId, $input['page_title'], $input['page_content'], $input['page_slug']))
			{
				\Activity::log('A page has been edited', array('edited' => $input['page_slug'], 'by' => \Auth::user()->id));
				return \Redirect::to('admin/pages');
			}
			return \Redirect::back()->withInput()->withErrors(array('Unable to update the page'));
	  	}
	   	return \Redirect::back()->withInput()->withErrors($v->messages);
	}

	public function doDisable($pageId)
	{
		\LPages::deletePage($pageId, false);
		\Activity::log('A page has been disabled', array('disabled' => $pageId, 'by' => \Auth::user()->id));
		return \Redirect::back();
	}

	public function doEnable($pageId)
	{
		\LPages::restorePage($pageId);
		\Activity::log('A page has been enabled', array('enabled' => $pageId, 'by' => \Auth::user()->id));
		return \Redirect::back();
	}

	public function doDelete($pageId)
	{
		\LPages::deletePage($pageId, true);
		\Activity::log('A page has been deleted', array('deleted' => $pageId, 'by' => \Auth::user()->id));
		return \Redirect::back();
	}
}