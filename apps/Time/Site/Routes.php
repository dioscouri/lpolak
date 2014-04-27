<?php
namespace Time\Site;

/**
 * Group class is used to keep track of a group of routes with similar aspects (the same controller, the same f3-app and etc)
 */
class Routes extends \Dsc\Routes\Group{
	
	
	function __construct(){
		parent::__construct();
	}
	
	/**
	 * Initializes all routes for this group
	 * NOTE: This method should be overriden by every group
	 */
	public function initialize(){
		$this->setDefaults(
				array(
					'namespace' => '',
					'url_prefix' => ''
				)
		);
				
		$this->add( '/', 'GET', array(
								'controller' => 'Time\Site\Controllers\Home',
								'action' => 'index'

		));
		
		$this->add( '/organizations', 'GET', array(
				'controller' => 'Time\Site\Controllers\Organizations',
				'action' => 'index',
		) );
		
		$this->add( '/organization/create', 'GET', array(
				'controller' => 'Time\Site\Controllers\Organization',
				'action' => 'create',
		) );

		$this->add( '/organization/create', 'POST', array(
				'controller' => 'Time\Site\Controllers\Organization',
				'action' => 'add',
		) );

		$this->add( '/organization/detail/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Organization',
				'action' => 'read',
		) );

		$this->add( '/organization/edit/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Organization',
				'action' => 'edit',
		) );
		
		$this->add( '/organization/edit/@slug', 'POST', array(
				'controller' => 'Time\Site\Controllers\Organization',
				'action' => 'update',
		) );

		$this->add( '/organization/detail/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Organization',
				'action' => 'read',
		) );

		$this->add( '/organization/delete/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Organization',
				'action' => 'delete',
		) );
				
		$this->add( '/projects', 'GET', array(
				'controller' => 'Time\Site\Controllers\Projects',
				'action' => 'index',
		) );
		
		$this->add( '/project/create', 'GET', array(
				'controller' => 'Time\Site\Controllers\Project',
				'action' => 'create',
		) );
		
		$this->add( '/project/create', 'POST', array(
				'controller' => 'Time\Site\Controllers\Project',
				'action' => 'add',
		) );
		
		$this->add( '/project/detail/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Project',
				'action' => 'read',
		) );
		
		$this->add( '/project/edit/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Project',
				'action' => 'edit',
		) );
		
		$this->add( '/project/edit/@slug', 'POST', array(
				'controller' => 'Time\Site\Controllers\Project',
				'action' => 'update',
		) );
		
		$this->add( '/project/detail/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Project',
				'action' => 'read',
		) );
		
		$this->add( '/project/delete/@slug', 'GET', array(
				'controller' => 'Time\Site\Controllers\Project',
				'action' => 'delete',
		) );
		
//		$this->addCrudGroup( 'Organizations', 'Organization', array( 'namespace' => '\\Time\\Site\\Controllers'), array( 'namespace' => '\\Time\\Site\\Controllers') );
		}
}