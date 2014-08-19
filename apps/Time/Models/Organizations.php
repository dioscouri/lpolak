<?php 

namespace Time\Models;

class Organizations extends  \Dsc\Mongo\Collections\Describable {

    protected $__collection_name = 'time.organizations';
	protected $__type = 'Time.organization';
	
	use \Dsc\Traits\Models\Notes;
	
	protected function fetchConditions()
	{
		parent::fetchConditions();
	
		$this->setCondition('type', $this->__type );
	
		return $this;
	}
	
	public function beforeSave(){
		$this->beforeSaveNotes();
		return parent::beforeSave();
	}
	
	public function getTasks(){
		$model = (new \Time\Models\Tasks)
					->populateState()->setState( 'filter.organization', $this->{'slug'} );
		
		return $model->getItems();
	}
}