<?php 
namespace Time\Site\Controllers;

class Organizations extends \Time\Site\Controllers\Base
{
	protected function getModel()
	{
		$model = new \Time\Site\Models\Organization;
		return $model;
	}
        
    public function index()
    {
    	echo "ahoj";
    	return;
        $model = $this->getModel();
        $state = $model->populateState()->getState();
        \Base::instance()->set('state', $state );
    
        $paginated = $model->paginate();
        \Base::instance()->set('paginated', $paginated );
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Time/Site/Views::organizations/list.php');
    }
}