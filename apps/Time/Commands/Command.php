<?php 

namespace Time\Commands;

interface Command {
	
	/**
	 * Runs command
	 */
	public function Run();
	
	/**
	 * Prepares command to be run
	 */
	public function Prepare();
	
	/**
	 * Tests, if all prerequisities for the command are met and that command can be run
	 * 
	 * Throws an exception in case something went wrong. Otherwise, it returns true
	 */
	public function CanRun();
}