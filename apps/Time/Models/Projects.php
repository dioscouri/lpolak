<?php 

namespace Time\Models;

class Projects extends  \Dsc\Mongo\Collections\Describable {

    protected $__collection_name = 'time.projects';
	protected $__type = 'Time.project';
	use \Dsc\Traits\Models\Notes;
	
	protected function fetchConditions()
	{
		parent::fetchConditions();
	
		$this->setCondition('type', $this->__type );
		
		$filter_organization = $this->getState( 'filter.organization', '' );
		if(strlen( $filter_organization ) ){
			echo $filter_organization;
			$this->setCondition( 'organization.slug', $filter_organization );
		}
		return $this;
	}

	public function beforeSave(){
		$this->beforeSaveNotes();
		return parent::beforeSave();
	}

	protected function beforeValidate()
	{
		if (!empty($this->organization_id))
		{	
			$item = (new \Time\Models\Organizations())
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
	
	public function getTasks(){
		$model = (new \Time\Models\Tasks)
					->populateState()->setState( 'filter.project', $this->{'slug'} );
		
		return $model->getItems();
	}
}