<?php 

namespace Time\Models;

class Project extends  \Dsc\Mongo\Collections\Describable {

	protected $__type = 'Time.project';
	
	protected function fetchConditions()
	{
		parent::fetchConditions();
	
		$this->setCondition('type', $this->__type );
	
		return $this;
	}
}