// Source: https://gist.github.com/electricg/4372563
// Not my work

var TimeStopwatch = function()	{
	// Private vars
	var	startAt	= 0;	// Time of last start / resume. (0 if not running)
	var	lapTime	= 0;	// Time on the clock when last stopped in milliseconds

	var	now	= function() {
			return (new Date()).getTime(); 
		}; 

	// Public methods
	// Start or resume
	this.start = function() {
			startAt	= startAt ? startAt : now();
		};

	// Stop or pause
	this.stop = function() {
			// If running, update elapsed time otherwise keep it
			lapTime	= startAt ? lapTime + now() - startAt : lapTime;
			startAt	= 0; // Paused
		};

	// Reset
	this.reset = function() {
			lapTime = startAt = 0;
		};
	
	// Initializes stopwatch to a certain time (just to make it a bit nicer to work with)
	this.initTo = function( new_start ){
		startAt = new_start;
	}

	// Duration
	this.time = function() {
			return lapTime + (startAt ? now() - startAt : 0); 
		};
		
	// returns the time in an object allowing to set offset time, if needed
	this.getFormattedTime = function(additional_time){
		additional_time = additional_time || 0;
		var act_duration = this.time() + additional_time;
		var res = { h: 0, m : 0, s : 0 };		
		
		res.h = Math.floor( act_duration / (3600 * 1000 ) );
		var rem = act_duration % (3600 * 1000 );
		res.m = Math.floor(  rem / (60 * 1000 ) );
		res.s = Math.floor( ( rem % (60 * 1000 ) ) / 1000 );

		return res;
	}
};