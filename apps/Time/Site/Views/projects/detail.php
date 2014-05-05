<div class="panel panel-info">
	<div class="panel-heading">Detail Project</div>
	<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-6">
					<h3>Name</h3>
					<?php echo $item->title; ?>
				</div>
				<div class="form-group col-md-6">
					<h3>Charge per Hour</h3>
					<?php echo $item->hourly_rate; ?>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<h3>Organization</h3>
					<a href="./organization/detail/<?php echo $item->{'organization.slug'}; ?>"><?php echo $item->{'organization.title'}; ?></a>
				</div>
				<div class="form-group col-md-6">
					<h3>Description</h3>
					<?php echo $item->description; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2 form-group">
					<a href="./projects" class="btn btn-warning">Back</a>
				</div>
			    <div class="col-md-2">
			    	<h3>Tags</h3>
					<?php echo implode(",", (array) $item->tags ); ?>			    
			    </div>
			</div>
	</div>
</div>