<?php 

namespace Time\Models;

class Organization extends  \Dsc\Mongo\Collections\Describable {

	protected $__type = 'Time.organization';
	
	protected function fetchConditions()
	{
		parent::fetchConditions();
	
		$this->setCondition('type', $this->__type );
	
		return $this;
	}
}