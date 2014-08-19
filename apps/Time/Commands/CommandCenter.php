<?php 

namespace Time\Commands;

class CommandCenter extends \Dsc\Singleton {
	
	/**
	 * Runs selected command
	 * 
	 * @param \Time\Commands\Command $command
	 */
	public function Execute(\Time\Commands\Command $command ){
		if( $command->CanRun() ){
			$command->Prepare();
			return $command->Run();
		}
		return null;
	}
}