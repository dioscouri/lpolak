<?php 
namespace Time\Site\Controllers;

class Dashboard extends \Time\Site\Controllers\Base
{
	protected function getModel( $name = 'organizations')
	{
		$model = null;
		switch( $name ) {
			case 'organizations':
				{
					$model = new \Time\Models\Organizations;
					break;
				}
			case 'projects':
				{
					$model = new \Time\Models\Projects;
					break;
				}
		}
		return $model;
	}
        
    public function index()
    {
        $model = $this->getModel();
        $state = $model->populateState()->getState();
        $this->app->set('state', $state );
    
        $paginated = $model->paginate();
        $this->app->set('paginated', $paginated );
        
        $latest_project = $this->getModel( 'projects' )->setState( 'filter.id', "53dfefcaf02e2539619f682b" )->getItem(); // for now, it is hardcoded
        $this->app->set( 'latest_project', $latest_project );
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Time/Site/Views::dashboard/view.php');
    }
}