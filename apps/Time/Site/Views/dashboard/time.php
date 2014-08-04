<?php 
	$act_project = 'Project test';
	$act_state = 'Stopped';
	$panel_css = 'default';
	$stopwatch_mode = 0; // undetermined
	
	switch( $act_state ){
		case 'Running' : 
			$panel_css = 'danger';
			$stopwatch_mode = 1;
			break;
		
		case 'Stopped' :
		default:
			$panel_css = 'success';
			$stopwatch_mode = 2;
	}
?>
<div class="panel panel-<?php echo $panel_css; ?>">
	<div class="panel-heading">
		<h4><?php echo $act_project; ?> - <b><?php echo $act_state; ?></b></h4>
	</div>
	<div class="panel-collapse collapse in">
		<div class="panel-body">
			<div class="row stopwatch-main">
				<div class="text-center col-xs-7 col-lg-10">
					<span class="stopwatch-time">1:12:45</span>
				</div>
				<div class="text-center col-xs-5 col-lg-2">
					<?php switch ( $stopwatch_mode ) {
						case 1 :  // run bitch, run!
							?>
						   		<button class="btn btn-danger btn-lg" type="button">
									<i class="fa fa-stop"></i>
						   		</button>
							<?php
							break;
						
						case 2 : // stop :(
						default:
							?>
								<button class="btn btn-success btn-lg" type="button">
									<i class="fa fa-play-circle"></i>
						   		</button>
							<?php
														
					} ?>
				</div>
			</div> <!--  div.stopwatch-main.row -->
			<hr />
			<div class="row">
				<div class="col-lg-10 col-md-10 col-xs-10">
					<select id="project-tasks" style="width : 100%">
						<option value="12">Task1</option>
				    	<option value="12">Task2</option>
				    	<option value="12">Task3</option>
				    	<option value="12">Task4</option>
				    	<option value="12">Task5</option>
				    </select>
				</div>
				<div class="col-lg-1 col-md-1 col-xs-1">
			   		<button class="btn btn-danger" type="button">
						<i class="fa fa-plus"></i>
			   		</button>
				</div>
			</div>
			<div class="row stopwatch-main">
	   			<div class="text-center col-xs-12 col-lg-12">
					<span class="stopwatch-task">3:17:45</span>
				</div>
			</div>
			<hr />
			<div class="row" id="note-controls">
	   			<div class="text-center col-xs-12 col-lg-12">
					<a href="javascript:;" data-element-type="show-note-form">Add a Note</a>
            		<a class="btn btn-xs btn-secondary" href="javascript:;" data-element-type="notes-list">
            			<i class="fa fa-list-ul"></i>
					</a>
				</div>
			</div>
			<div id="add-note-form">
				<div class="row form-group">
					<div class="col-lg-12 col-xs-12">
						<label>New Note</label>
						<textarea id="note_task" class="form-control" placeholder="Put your note here"></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-12 col-xs-12">
						<button class="btn btn-success" data-element-type="save-note">Save</button>
						&nbsp;&nbsp;
						<button class="btn btn-danger" data-element-type="reset-note">Clear</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$('div#add-note-form').hide(1);
	$("#project-tasks").select2();

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

	
});
</script>