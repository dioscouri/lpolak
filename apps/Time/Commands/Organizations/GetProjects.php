<?php

namespace Time\Commands\Organizations;

class GetProjects implements \Time\Commands\Command{
	
	private $_org = null;
	private $_project_model = null;
	
	public function SetOrganization(\Time\Models\Organizations $org ){
		$this->_org = $org;
	}
	
	public function Run(){
		return $this->_project_model->getItems();
	}
	
	public function Prepare(){
		$this->_project_model = (new \Time\Models\Projects)->setState( 'filter.organization', $this->_org->{'slug'} );
	}
	
	public function CanRun(){
		if( $this->_org == null ){
			throw new \Exception( 'No Organization specified.' );
		}
		
		return true;
	}
}