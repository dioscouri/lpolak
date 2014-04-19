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
					'namespace' => '\Time',
					'url_prefix' => '/'
				)
		);
		
        // TODO set some app-specific settings, if desired
		$this->add( '', 'GET', array(
								'controller' => 'Site\Controllers\Home',
								'action' => 'index'
								));
	}
}