<?php 

namespace Time\Models;

class Organization extends  \Dsc\Mongo\Collections\Describable {

    protected $__collection_name = 'time.organizations';
	protected $__type = 'Time.organization';
	
	protected function fetchConditions()
	{
		parent::fetchConditions();
	
		$this->setCondition('type', $this->__type );
	
		return $this;
	}
	
	protected function beforeSaveNotes(){
		if( empty( $this->notes ) ) {
			$this->notes = array();
		}
		$last_idx_old = 0;
		$toDelete = array();
		$old_notes = array();
		$user = array();
		$identity = \Dsc\System::instance()->get('auth')->getIdentity();
        if (empty($identity->id)) 
        {
        	$user = array(
        		'id' => new \MongoId(),
        		'name' => 'Guest',
        	);
        }
		else 
		{
			$user = array(
				'id' => $identity->id,
				'name' => $identity->fullName(),
			);
		}
		
		$notes = $this->notes;
		ksort( $notes );

		if( strlen( (string)($this->id) ) ){ // editing
			$old_document = (new static)->setState( 'filter.id', $this->id )->getItem();
			$old_notes = (array) $old_document->notes;
			
			$last_idx_old = count( $old_notes );
			if( empty( $this->__notesToDelete ) == false ){
				$toDelete = (array) explode( ',', (string) $this->__notesToDelete );
			}
			for( $i = 0, $c = count( $toDelete ); $i < $c; $i++ ){
				unset( $notes[(int)$toDelete[$i]] );
			}
		}
		// in case user will try to manually delete some notes
		$last_idx = end( ( array_keys( $notes ) ) );
		$modified = array(); // array with modified notes
		for( $i = 0; $i <= $last_idx; $i++ ){
			
			// skip deleted notes
			if( in_array( $i, $toDelete ) !== false){ // if this was erased by accident, copy its copy from old document
				continue;
			}

			$old_note = array( 'title' => '', 'description' => '' );
			if( !empty( $old_notes[$i] ) ) {
				$old_note = $old_notes[$i];
			}

			$notes[$i]['title'] = trim( $notes[$i]['title'] );
			$notes[$i]['description'] = trim( $notes[$i]['description'] );
			if( $i < $last_idx_old ){
				if( empty( $notes[$i] )  ) {
					$notes[$i] = $old_note;
					continue;
				}
				if( empty( $notes[$i]['description'] ) ){ // skip empty notes
					continue;
				}
				if( $old_note['title'] != $notes[$i]['title'] || $old_note['description'] != $notes[$i]['description']) {
					$notes[$i]['user'] = $user;
					$notes[$i]['datetime'] = \Dsc\Mongo\Metastamp::getDate('now');
					$modified []= $notes[$i];
					unset($notes[$i]);
				} else {
					$notes[$i] = $old_note;	
				}
				
			} else {
				$notes[$i]['user'] = $user;
				$notes[$i]['datetime'] = \Dsc\Mongo\Metastamp::getDate('now');
			}
		}
		for( $i = 0, $c = count( $modified ); $i < $c; $i++ ){
			$notes []= $modified[$i];
		}
		
		$this->notes = array_values( $notes );
	}
	
	public function beforeSave(){
		$this->beforeSaveNotes();
		return parent::beforeSave();
	}
	
	public function getProjects(){
		$model = (new \Time\Models\Project)
					->populateState()->setState( 'filter.organization', $this->{'slug'} );
		
		return $model->getItems();
	}
}