var Notes = Notes || {
	
	// set up initial CSS constants
	init : function(){
		this.userName = 'guest';
		this.speed = 'fast';
		this.idx = 0;  // index from which counting new notes should start off
		this.toDelete = []; // list of idx of notes to be deleted		
		
		$( 'div[data-element-type="add-note-form"] button[data-task="clear-note"]' ).hide();
	},
	
	// sets current name used when editing note
	setUserName : function(name){
		this.userName = name;
	},
	
	// sets the note to modified mode
	setModified : function( el ){
		el.attr( 'data-modified', '1' );		
	},
	
	// sets whether the note was deleted or not (deleted notes notify user that they had to save their actions)
	setDeletedState : function( el, state ){
		el.attr( 'data-deleted', state );		
	},
		
	// sets text status for note
	setNoteStatusText : function( el, txt ){
		el.find( 'strong[data-element-type="note-status"]' ).html(txt);
	},
	
	toggleToolbarDeleteState : function( el ){
		if( el.attr( 'data-deleted' ) == '1' ){
			el.find( 'div[data-element-type="toolbar"] a[data-task!="undelete"]' ).hide(function(){
				el.find( 'div[data-element-type="toolbar"] a[data-task="undelete"]' ).show();				
			});
		} else {
			el.find( 'div[data-element-type="toolbar"] a[data-task="undelete"]' ).hide(function(){
				el.find( 'div[data-element-type="toolbar"] a[data-task!="undelete"]' ).show();							
			});			
		}	},
	
	// binds events to all control elements
	bindEvents : function(){
		var current_this = this;
		
		$('body')
			// edit button
			.on('click',
				'div[data-element-type="note"] h3.panel-title div[data-element-type="toolbar"] a[data-task="edit"]',
				function (e){
					var $this = $( e.currentTarget );
					var $note = $this.parents( 'div[data-element-type="note"]' );

					current_this.changeToEditMode( $note, current_this.speed );
			})
			// delete button
			.on('click',
				'div[data-element-type="note"] h3.panel-title div[data-element-type="toolbar"] a[data-task="delete"]',
				function (e){
					bootbox.confirm( 'Do you want to delete this note?', function( res ){
						if( res == true ){
							var $this = $( e.currentTarget );
							var $note = $this.parents( 'div[data-element-type="note"]' );
			
							current_this.changeToDeletedMode( $note, current_this.speed );							
						}
					});
			})
			// undelete button
			.on('click',
				'div[data-element-type="note"] h3.panel-title div[data-element-type="toolbar"] a[data-task="undelete"]',
				function (e){
					bootbox.confirm( 'Do you want to undelete this note?', function( res ){
						if( res == true ){
							var $this = $( e.currentTarget );
							var $note = $this.parents( 'div[data-element-type="note"]' );
			
							current_this.changeToUnDeletedMode( $note, current_this.speed );							
						}
					});
			})
			// cancel button
			.on('click',
				'div[data-element-type="note"] div[data-element-type="edit-tools"] button[data-task="cancel"]',
				function (e){
					e.preventDefault();
					var $this = $( e.currentTarget );
					var $note = $this.parents( 'div[data-element-type="note"]' );

					current_this.changeToNormalMode( $note, false, current_this.speed );
			})
			// save button
			.on('click',
				'div[data-element-type="note"] div[data-element-type="edit-tools"] button[data-task="save"]',
				function (e){
					e.preventDefault();
					var $this = $( e.currentTarget );
					var $note = $this.parents( 'div[data-element-type="note"]' );

					current_this.changeToNormalMode( $note, true, current_this.speed );
			})
			// Add note button
			.on('click',
				'div[data-element-type="add-note-form"] button[data-task="add-note"]',
				function (e){
					e.preventDefault();
					var $this = $( e.currentTarget );
	
					current_this.addNoteToList( $this );
			})
			// Clear note button
			.on('click',
				'div[data-element-type="add-note-form"] button[data-task="clear-note"]',
				function (e){
					e.preventDefault();
					var $this = $( e.currentTarget );
					var $note = $this.parents( 'div[data-element-type="note"]' );
	
					current_this.clearAddNoteForm( $this );
			})
			.on( 'keypress',
				'div[data-element-type="add-note-form"] :input', 
				function( e ){
					current_this.toggleClearButton();				
				});
		
	},
	
	toggleClearButton : function(){
		var s = '';
		var $panel = $( 'div[data-element-type="add-note-form"]' );
		$( ':input', $panel ).each( function( idx, e ){
			s += $(e).val();
		});

		if( s.length > 0 ){
			$panel.find( 'button[data-task="clear-note"]' ).show();
		} else {
			$panel.find( 'button[data-task="clear-note"]' ).hide()
		}
	},
	
	// this method clears data in "add-note" form
	// el is instance of jQuery pointing to panel group with "add-note" form
	clearAddNoteForm : function( el ){
		// empty fields
		el.find( '#inpAddNoteTitle' ).val( '' );
		el.find( '#inpAddNoteDesc' ).val( '' );
		
		// and hide "clear" button
		this.toggleClearButton();
	},
	
	// this method adds this note to list
	// el is instance of jQuery pointing to panel group with "add-note" form
	addNoteToList : function( el ){
		
	},
	
	// changes note to edit mode
	//el => main panel div for note
	changeToEditMode : function( el, speed ){
		if( el.data( 'mode' ) == 'edit' ){
			return;
		}
		
		// first, move data to visible input fields
		idx = el.data( 'note-idx' );
		title = el.find('input[name="notes['+idx+'][title]"]').val();
		desc = el.find('input[name="notes['+idx+'][description]"]').val();
		el.find('#note_'+idx+'_title').val(title);
		el.find('#note_'+idx+'_description').val(desc);
		
		speed = speed || null;
		if( speed == null ){
			el.find( 'div[data-element-type="original-text"]' ).hide(function(){
				el.find( 'div[data-element-type="toolbar"]' ).hide();
				el.find( 'div[data-element-type="edit-tools"]' ).show();
			});
		} else {
			el.find( 'div[data-element-type="original-text"]' ).fadeOut(speed, function() {
				el.find( 'div[data-element-type="toolbar"]' ).fadeOut( speed );
				el.find( 'div[data-element-type="edit-tools"]' ).fadeIn( speed );				
			});
		}

		this.setNoteMode( el, 'edit' );
	},
	
	// sets new mode for note and store previous one for later use
	setNoteMode : function( el, new_mode ){
		var act_mode = el.data( 'mode' );
		el.attr('data-prev-mode', act_mode );
		el.attr( 'data-mode', new_mode );		
	},
	
	// sets new mode for note and store previous one for later use
	restoreNoteMode : function( el, mode ){
		var act_mode = el.data( 'prev-mode' ) || 'normal';
		el.attr('data-prev-mode', '' );
		el.attr( 'data-mode', act_mode );		
	},
	
	// changes note to normal mode
	// el => main panel div for note
	// use_change => -1 = do nothing; 0 = discharge changes; 1 = save changes
	changeToNormalMode : function( el, use_change, speed ){
		var act_mode = el.data( 'mode' );
		if(  $.inArray( act_mode, [ 'normal', 'deleted', 'undeleted' ]) > -1 ){
			return;
		}
		
		idx = el.data( 'note-idx' );
		title = el.find('input[name="notes['+idx+'][title]"]').val();
		desc = el.find('input[name="notes['+idx+'][description]"]').val();
		if( use_change == 1){ // user hit "Save" so we need to change this 
			title = el.find('#note_'+idx+'_title').val();
			desc = el.find('#note_'+idx+'_description').val();

			// update hidden fields
			el.find( 'input[name="notes['+idx+'][title]"]' ).val(title);
			el.find( 'input[name="notes['+idx+'][description]"]' ).val(desc);

			// mark this note as modified so browser knows user needs to save the document
			el.removeClass( 'panel-default' ).addClass('panel-warning');
			
			// now, update visible html elements
			el.find( 'span.note-title' ).html( title + " <small>(now by " + this.userName + ")</smalll>" );
			el.find().html( desc );			
			
			this.setNoteStatusText(el, 'Waiting to be saved');
			this.setModified( el );
		}

		speed = speed || null;
		if( speed == null ){
			el.find( 'div[data-element-type="edit-tools"]' ).hide( function() {
				el.find( 'div[data-element-type="original-text"]' ).show();
				el.find( 'div[data-element-type="toolbar"]' ).show();				
			});
		} else {
			el.find( 'div[data-element-type="edit-tools"]' ).fadeOut( speed, function() {
				el.find( 'div[data-element-type="original-text"]' ).fadeIn( speed );
				el.find( 'div[data-element-type="toolbar"]' ).fadeIn(speed);				
			});
		}

		this.toggleToolbarDeleteState(el);
		this.restoreNoteMode(el);
	},
	
	// changes note to deleted mode
	// el => main panel div for note
	changeToDeletedMode : function( el, speed ){
		if( el.attr( 'data-mode' ) != 'normal' ){
			console.log( 'damn' );
			console.log( 'mode => ' + el.attr( 'data-mode' ) );
			return;
		}
		
		var note_idx = el.attr( 'data-note-idx' );
		// check, if we didnt delete this note already
		if( $.inArray( note_idx, this.toDelete ) > -1 ) {
			return;
		}
		this.toDelete.push( note_idx );
		$( "#notesToDelete" ).val( this.toDelete.join( ',') );		
		
		el.removeClass( 'panel-default' ).addClass( 'panel-danger' );
		el.find( 'div[data-element-type="toolbar"] a' ).hide();

		this.setNoteStatusText(el, 'Deleted and waiting to be saved');
		this.setDeletedState( el, '1' );
		this.setNoteMode( el, 'deleted' );
		this.toggleToolbarDeleteState(el);
	},
	
	
	// changes note to undeleted mode (consider that user might have done some changes to the note)
	// el => main panel div for note
	changeToUnDeletedMode : function( el, speed ){
		// check, if this note was ever deleted
		if( el.attr( 'data-deleted' ) != '1' || el.attr( 'data-mode' ) != 'deleted' ){
			// nope :P
			return;
		}
		
		var note_idx = el.attr( 'data-note-idx' );
		// find position of this index in toDelete array and delete it
		var  key_idx = this.toDelete.indexOf( note_idx );
		if( key_idx == -1 ){ // not found here. Why? Some questions you simply do not ask.
			return;
		} else {
			this.toDelete.splice( key_idx, 1 );
		}
		$( "#notesToDelete" ).val( this.toDelete.join( ',') );		
		
		// let me see, if note was modified before being deleted
		if( el.attr( 'data-modified') == '1' ){
			// it was modified so let's go back to that state
			el.removeClass( 'panel-danger' ).addClass( 'panel-warning' );
			this.setNoteStatusText(el, 'Waiting to be saved');			
		} else {
			// it wasnt, so let's leave it as it was before
			this.setNoteStatusText(el, '');
			el.removeClass( 'panel-danger' ).addClass( 'panel-default' );
		}
		el.find( 'div[data-element-type="toolbar"] a' ).show();			
		this.setDeletedState(el, '');
		this.setNoteMode( el, 'normal' );
		this.toggleToolbarDeleteState(el);
	},
	
	// adds new note to list
	addNewNote : function( title, desc ){		
	},
	
	// sets all notes to normal mode
	allNotesToNormalMode : function(){
		current_this = this;
		$( 'div.panel[data-element-type="note"]' ).each( function( idx, el ) {
			current_this.changeToNormalMode( $( el ), -1 );
		} );
	}
};

$(function() {
	Notes.init();
	Notes.bindEvents();
	Notes.allNotesToNormalMode();	
});