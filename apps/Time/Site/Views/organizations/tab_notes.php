<?php 
	$notes = (array) $item->{'notes'};
	
	echo $this->renderLayout('Time/Site/Views::organizations/fields_add_note.php');
?>

<?php for( $i = 0; $i < 5; $i++ ) { ?>
<div class="panel panel-default" data-element-type="note" data-mode="" data-note-idx="<?php echo $i; ?>">
  <div class="panel-heading">
  	<h3 class="panel-title">
		<span class="note-title"><?php echo $i; ?>Note Title <small>(07/03/2014 20:32 by User)</small></span>
    	<div class="pull-right" data-element-type="toolbar">
    		<strong data-element-type="note-status"></strong>
    		&nbsp;
			<a class="btn btn-xs btn-secondary" href="javascript:;" data-task="edit">
				<i class="fa fa-pencil"></i>
			</a>
			&nbsp;
			<a class="btn btn-xs btn-danger" href="javascript:;" data-task="delete">
				<i class="fa fa-times"></i>
			</a>
			<a class="btn btn-xs btn-success" href="javascript:;" data-task="undelete">
				<i class="fa fa-times"></i>
			</a>
			</div>
    </h3>
  </div>
  <div class="panel-body">
  	<div data-element-type="original-text">
		<?php echo $i; ?>Awesome note with a looot of text. For now!
  	</div>
	<div data-type="edit" data-element-type="edit-tools">
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" id="note_<?php echo $i; ?>_title"/>
		</div>
		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" rows="3" id="note_<?php echo $i; ?>_description"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-success" data-task="save">Save</button>
			<button class="btn btn-danger" data-task="cancel">Cancel</button>
		</div>
	</div>
	<input type="hidden" name="notes[<?php echo $i; ?>][title]" value="Note Title<?php echo $i; ?>" />
	<input type="hidden" name="notes[<?php echo $i; ?>][description]" value="<?php echo $i; ?>Awesome note with a looot of text. For now!" />
	</div>
</div>

<?php } ?>
<?php if( count( $notes ) ) { ?>
<?php } else { ?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-info">
		No notes ... 
		</div>
	</div>
</div>
<?php } ?>
<input name="__notesToDelete" id="notesToDelete" type="hidden" value="" />
<script type="text/javascript">
$(function(){
	Notes.setUserName( 'elf' );
});
</script>