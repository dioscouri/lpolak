<?php 
namespace Time\Site\Controllers;

class Organization extends \Time\Site\Controllers\Base
{
	use \Dsc\Traits\Controllers\CrudItemCollection;
	
	protected $crud_item_key = 'slug';
    protected $list_route = '/organizations';
    protected $create_item_route = '/organization/create';
    protected $get_item_route = '/organization/detail/{id}';    
    protected $edit_item_route = '/organization/edit/{id}';

    protected function getModel() {
    	$model = new \Time\Models\Organization;
    	return $model;
    }

    protected function getItem()
    {
        $f3 = \Base::instance();
        $slug = $this->inputfilter->clean( $f3->get('PARAMS.slug'), 'CMD' );
        $model = $this->getModel()
        ->setState('filter.slug', $slug);
    
        try {
            $item = $model->getItem();
        } catch ( \Exception $e ) {
            \Dsc\System::instance()->addMessage( "Invalid Organization: " . $e->getMessage(), 'error');
            $f3->reroute( $this->list_route );
            return;
        }
    
        return $item;
    }
    
    protected function displayCreate()
    {
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Create Organization');
    
        $view = \Dsc\System::instance()->get('theme');
        $all_tags = $this->getModel()->getTags();
        \Base::instance()->set('all_tags', $all_tags );
        $this->app->set( 'meta.title', 'Create a Organization' );
        echo $view->render('Time/Site/Views::organizations/create.php');
    }
    
    protected function displayEdit()
    {
		$item = $this->getItem();
	   	$identifier = preg_replace('/\{id\}/', $item->get( $this->getModel()->getItemKey() ), $this->edit_item_route);
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Edit Organization');
    
        $view = \Dsc\System::instance()->get('theme');
        $all_tags = $this->getModel()->getTags();
        \Base::instance()->set('all_tags', $all_tags );
        $this->app->set( 'meta.title', 'Edit Organization' );
        echo $view->render('Time/Site/Views::organizations/edit.php');
    }

    protected function displayRead() {
    	$item = $this->getItem();
    	$identifier = preg_replace('/\{id\}/', $item->get( $this->getModel()->getItemKey() ), $this->edit_item_route);
    	$f3 = \Base::instance();
    	$f3->set('pagetitle', 'Detail Organization - '.$item->title);
    	
    	$view = \Dsc\System::instance()->get('theme');
        $this->app->set( 'meta.title', 'Detail Organization' );
        echo $view->render('Time/Site/Views::organizations/detail.php');
    }
}