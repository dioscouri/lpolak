var TimerUI = function(){
	
	var status = null;
	
	this.bootstrap = function(){
		window.TimeTimer = new TimeStopwatch();
		this.status = 0;
		this.hideForms();
		this.bindEvents();
	}
	
	this.bindEvents = function(){
		
		// start-stop stopwatch
		$('button[data-element-type="timer-control"]').on( 'click', function(e){
			var $this = $(e.currentTarget );
			mode = $this.attr( 'data-action' );
			alert(mode);
		});
		
		
		// tasks park
		$("button[data-element-type='show-task-form']").on( 'click', function() {
			$( 'div#task-timer-controls-part' ).fadeOut( 'fast', function() {
				$('div#add-task-form').fadeIn( 'fast');
			});
		}); 

		$("button[data-element-type='reset-task']").on( 'click', function() {
			$( 'div#add-task-form' ).fadeOut( 'fast', function() {
				$( 'input#task_title' ).val( '' );
				$('div#task-timer-controls-part').fadeIn( 'fast');
			});
		}); 
		

		// notes part
		$("a[data-element-type='show-note-form']").on( 'click', function() {
			$( 'div#note-controls' ).fadeOut( 'fast', function() {
				$('div#add-note-form').fadeIn( 'fast');
			});
		}); 

		$("button[data-element-type='reset-note']").on( 'click', function() {
			$( 'div#add-note-form' ).fadeOut( 'fast', function() {
				$( 'textarea#note_task' ).val( '' );
				$('div#note-controls').fadeIn( 'fast');
			});
		}); 

		
		$("a[data-element-type='notes-list']").on('click', function() {
				alert("To be finished");
			});		
	}
	
	
	this.hideForms = function(){
		$('div#add-note-form').hide(1);// be default, the add-note form is hidden
		$('div#add-task-form').hide(1);// be default, the add-task form is hidden		
	}
	
	this.setTimeUI = function( act_time, target ){
		var mins = act_time.m < 10 ? '0' + act_time.m : act_time.m; 
		var secs = act_time.s < 10 ? '0' + act_time.s : act_time.s; 

		$( target ).html( act_time.h + ":" + mins + ":" + secs );		
	}
	
	this.startOffStopwatch = function( offset ){
		if( this.status == 0 ){
			if( offset > 0 ){
				window.TimeTimer.initTo( offset );
			}
			window.TimeTimer.start();
			
			var current_this = this;
			this.intervalHandle = setInterval( function() {
				current_this.setTimeUI(window.TimeTimer.getFormattedTime(), '.stopwatch-main .stopwatch-time' );
				current_this.setTimeUI(window.TimeTimer.getFormattedTime(33000), '.stopwatch-main .stopwatch-task' );
			}, 300);			
		}
	}
	
	this.stopOffStopwatch = function(){
		if( this.status == 1 ){ // if clock is running
			clearInterval( this.intervalHandle );			
		}
	}	
};
					
$(function(){
	


});