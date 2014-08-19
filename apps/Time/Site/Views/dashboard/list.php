<form class="searchForm" method="post" action="./dashboard">

    <div class="no-padding">

        <div class="row">

			<div class="panel-group" id="accordion">
				<?php if (!empty($paginated->items)) { ?>
		            
				<?php foreach($paginated->items as $org) { ?>
				<div class="panel panel-default">
				    <div class="panel-heading">
				    	<h4 class="panel-title">
				        	<a data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $org->slug; ?>">
				          		<?php echo $org->title; ?>
				        	</a>
				      	</h4>
				    </div>
				    <div id="collapse-<?php echo $org->slug; ?>" class="panel-collapse collapse">
				      	<div class="panel-body">
							<ul>
					      	<?php
					      		$cmd = \Time\Commands\Factories\Organizations::GetProjects( $org );
						      	$projects = \Dsc\System::instance()->get( 'Time.CommandCenter' )->Execute($cmd);
						      	unset( $cmd );
						      	foreach( (array)$projects as $project ) { ?>
								<li><a href="javascript:;" alt="<?php echo $project->title; ?>"><?php echo $project->title; ?></a></li>					
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
				<?php
					}
				} ?>
			</div>
		</div>
	</div>
</form>