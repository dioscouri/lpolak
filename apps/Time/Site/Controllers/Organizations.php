<?php 
namespace Time\Site\Controllers;

class Organizations extends \Time\Site\Controllers\Base
{
	
	protected function getModel()
	{
		$model = new \Time\Models\Organizations;
		return $model;
	}
        
    public function index()
    {
        $model = $this->getModel();
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
    
        $paginated = $model->paginate();
        \Base::instance()->set('paginated', $paginated );
        
        $this->app->set( 'meta.title', 'Organizations' );
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Time/Site/Views::organizations/list.php');
    }
}