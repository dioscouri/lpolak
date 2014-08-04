<?php 
namespace Time\Site\Controllers;

class Projects extends \Time\Site\Controllers\Base
{
	protected function getModel()
	{
		$model = new \Time\Models\Projects;
		return $model;
	}
        
    public function index()
    {
        $model = $this->getModel();
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
    
        $paginated = $model->paginate();
        \Base::instance()->set('paginated', $paginated );
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Time/Site/Views::projects/list.php');
    }
}