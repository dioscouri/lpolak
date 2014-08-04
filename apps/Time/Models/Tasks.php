<?php 

namespace Time\Models;

class Tasks extends  \Dsc\Mongo\Collections\Describable {

    protected $__collection_name = 'time.tasks';
	protected $__type = 'Time.task';
	
	protected function fetchConditions()
	{
		parent::fetchConditions();
	
		$this->setCondition('type', $this->__type );
		
		$filter_project = (string)$this->getState( 'filter.project' );
		if( strlen( $filter_project ) ){
			$this->setCondition( 'project', $filter_project );
		}
	
		$filter_organization = (string)$this->getState( 'filter_organization' );
		if( strlen( $filter_organization ) ){
			$this->setCondition( 'organization', $filter_organization );
		}
		
		return $this;
	}
}