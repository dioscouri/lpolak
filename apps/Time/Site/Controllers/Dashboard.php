<?php 
namespace Time\Site\Controllers;

class Dashboard extends \Time\Site\Controllers\Base
{
	protected function getModel( $name = 'organization')
	{
		$model = null;
		switch( $name ) {
			case 'organization':
				{
					$model = new \Time\Models\Organizations;
					break;
				}
		}
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
        echo $view->render('Time/Site/Views::dashboard/view.php');
    }
}