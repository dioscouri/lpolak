<div class="panel panel-info">
	<div class="panel-heading">Detail Organization</div>
	<div class="panel-body">
			<div class="row">
				<div class="form-group col-md-6">
					<h3>Name</h3>
					<?php echo $item->title; ?>
				</div>
				<div class="form-group col-md-6">
					<h3>Contact Email</h3>
					<?php echo $item->email; ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2 form-group">
					<a href="./organizations" class="btn btn-warning">Back</a>
				</div>
			    <div class="col-md-2">
			    	<h3>Tags</h3>
					<?php echo implode(",", (array) $item->tags ); ?>			    
			    </div>
			</div>
	</div>
</div>