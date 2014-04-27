<?php 
namespace Time\Site\Controllers;

class Project extends \Time\Site\Controllers\Base
{
	use \Dsc\Traits\Controllers\CrudItemCollection;
	
	protected $crud_item_key = 'slug';
    protected $list_route = '/projects';
    protected $create_item_route = '/projects/create';
    protected $get_item_route = '/projct/detail/{id}';    
    protected $edit_item_route = '/project/edit/{id}';

    protected function getModel() {
    	$model = new \Time\Models\Project;
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
            \Dsc\System::instance()->addMessage( "Invalid Project: " . $e->getMessage(), 'error');
            $f3->reroute( $this->list_route );
            return;
        }
    
        return $item;
    }
    
    protected function displayCreate()
    {
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Create Project');
    
        $view = \Dsc\System::instance()->get('theme');
        $all_tags = $this->getModel()->getTags();
        \Base::instance()->set('all_tags', $all_tags );
        echo $view->render('Time/Site/Views::projects/create.php');
    }
    
    protected function displayEdit()
    {
		$item = $this->getItem();
	   	$identifier = preg_replace('/\{id\}/', $item->get( $this->getModel()->getItemKey() ), $this->edit_item_route);
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Project Organization');
    
        $view = \Dsc\System::instance()->get('theme');
        $all_tags = $this->getModel()->getTags();
        \Base::instance()->set('all_tags', $all_tags );
        echo $view->render('Time/Site/Views::projects/edit.php');
    }

    protected function displayRead() {
    	$item = $this->getItem();
    	$identifier = preg_replace('/\{id\}/', $item->get( $this->getModel()->getItemKey() ), $this->edit_item_route);
    	$f3 = \Base::instance();
    	$f3->set('pagetitle', 'Project Organization - '.$item->title);
    	
    	$view = \Dsc\System::instance()->get('theme');
    	echo $view->render('Time/Site/Views::projects/detail.php');
    }
}