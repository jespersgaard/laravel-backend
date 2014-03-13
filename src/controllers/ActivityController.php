<?php namespace JeroenG\LaravelBackend\Controllers;

class ActivityController extends BaseController {

	public function showIndex($number = 10)
	{
		$data = array(
			'number' => $number,
			'logs'	 =>	\Activity::getRecentLogs($number),
		);
		$this->layout->content = \View::make('backend::activities')->with($data);
	}

	public function doClean($number)
	{
		$limit = \Carbon\Carbon::now()->subDays($number);
		foreach(\Activity::getAllLogs() as $log)
		{
			$diff = $limit->diffInDays($log->created_at);
			if($diff > $number)
			{
				$log->delete();
			}		
		}
		\Activity::log('There were logs deleted', array('days_saved' => $number, 'by' => \Auth::user()->id));
		return \Redirect::to('admin/activity');
	}
}