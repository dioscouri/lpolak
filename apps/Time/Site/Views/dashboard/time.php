<?php 
	$act_project = $latest_project->title;
	$act_state = 'Stopped';
	$panel_css = 'default';
	$stopwatch_mode = $latest_project->current_state;
	
	switch( $stopwatch_mode ){
		case \Time\Constants\Projects::StateProjectRunning : 
			$act_state = 'Running';
			$panel_css = 'danger';
			break;
		
		case \Time\Constants\Projects::StateProjectStopped : 
		default:
			$act_state = 'Stopped';
			$panel_css = 'success';
	}
?>
<div class="panel panel-<?php echo $panel_css; ?>">
	<div class="panel-heading">
		<h4><?php echo $act_project; ?> - <b><?php echo $act_state; ?></b></h4>
	</div>
	<div class="panel-collapse collapse in">
		<div class="panel-body">
			<!-- Main stopwatch -->
			<div class="row stopwatch-main">
				<div class="text-center col-xs-7 col-lg-10">
					<span class="stopwatch-time">1:12:45</span>
				</div>
				<div class="text-center col-xs-5 col-lg-2">
					<?php switch ( $stopwatch_mode ) {
						case \Time\Constants\Projects::StateProjectRunning : // run, bitch, run!
							?>
						   		<button class="btn btn-danger btn-lg" data-element-type="timer-control" data-action="stop">
									<i class="fa fa-stop"></i>
						   		</button>
							<?php
							break;
						
						case \Time\Constants\Projects::StateProjectStopped : 
						default:
							?>
								<button class="btn btn-success btn-lg" data-element-type="timer-control" data-action="start">
									<i class="fa fa-play-circle"></i>
						   		</button>
							<?php
														
					} ?>
				</div>
			</div> <!--  div.stopwatch-main.row -->
			<hr />
			
			<!-- Task stopwatch -->
			<div id="task-timer-controls-part">
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
				   		<button class="btn btn-danger" data-element-type="show-task-form">
							<i class="fa fa-plus"></i>
				   		</button>
					</div>
				</div>
				<div class="row stopwatch-main">
		   			<div class="text-center col-xs-12 col-lg-12">
						<span class="stopwatch-task">3:17:45</span>
					</div>
				</div>
			</div>
			<div id="add-task-form">
				<div class="row form-group">
					<div class="col-lg-12 col-xs-12">
						<label>New Task</label>
						<input type="text" id="task_title" class="form-control" placeholder="Put title of the task here" />
					</div>
				</div>
				<div class="row form-group">
					<div class="col-lg-12 col-xs-12">
						<button class="btn btn-success" data-element-type="save-task">Save</button>
						&nbsp;&nbsp;
						<button class="btn btn-danger" data-element-type="reset-task">Clear</button>
					</div>
				</div>
			</div>
			<hr />
			
			<!-- Note controles -->
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
	$("#project-tasks").select2();
	var timer = new TimerUI();
	timer.bootstrap();
<?php if( $latest_project->{'current_state'} == \Time\Constants\Projects::StateProjectRunning ) { ?>
	timer.startOffStopwatch(13000);
<?php } ?>
});
</script>