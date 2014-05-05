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
				    <div id="collapse-<?php echo $org->slug; ?>" class="panel-collapse collapse in">
				      <div class="panel-body">
				      <?php 
				      	$projects = $org->getProjects();
				      	print_r( $projects );
				      ?>
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