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

	protected function beforeValidate()
	{
		if (!empty($this->organization_id))
		{	
			$item = (new \Time\Models\Organization())
						->setState('select.fields', array('title', 'slug'))
						->setState('filter.id', $this->organization_id)
						->getItem();
			
			if( !empty( $item ) ){
				$this->organization = array(
						'id' => $this->organization_id,
						'title' => $item->{'title'},
						'slug' => $item->{'slug'},
				);
				
			}
			unset($this->organization_id);
		}
	
		return parent::beforeValidate();
	}
}