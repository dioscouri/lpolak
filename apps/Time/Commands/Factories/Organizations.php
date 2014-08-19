<?php

namespace Time\Commands\Factories;

class Organizations extends \Dsc\Singleton{
	
	/**
	 * This method prepares command to get all projects from an organization and returns its instance
	 */
	static public function GetProjects(\Time\Models\Organizations $org ){
		$command = new \Time\Commands\Organizations\GetProjects();
		$command->setOrganization( $org );
		return $command;
	}
}