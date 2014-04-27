<div class="panel panel-info">
	<div class="panel-heading">Edit Organization</div>
	<div class="panel-body">
		<form method="POST" role="form">
			<div class="row">
				<div class="form-group col-md-6">
					<label>Name</label>
					<input name="title" value="<?php echo $item->title; ?>" type="text" class="form-control" placeholder="Name of Organization or Client"/>
				</div>
				<div class="form-group col-md-6">
					<label>Contact Email</label>
					<input name="email" value="<?php echo $item->email; ?>" type="email" class="form-control" placeholder="Contact Cmail"/>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2 form-group">
					<button type="submit" class="btn btn-success">Save</button>
					<a href="./organizations" class="btn btn-warning">Back</a>
				</div>
			    <div class="col-md-2">
			
			        <div class="portlet">
			
			            <div class="portlet-header">
			
			                <h3>Tags</h3>
			
			            </div>
			            <!-- /.portlet-header -->
			
			            <div class="portlet-content">
			            
			                <div class="input-group">
			                    <input name="tags" data-tags='<?php echo json_encode( $all_tags ); ?>' value="<?php echo implode(",", (array) $flash->old('tags') ); ?>" type="text" class="form-control ui-select2-tags" /> 
			                </div>
			                <!-- /.form-group -->
			
			            </div>
			            <!-- /.portlet-content -->
			
			        </div>
			        <!-- /.portlet -->
			
			    </div>
			</div>
		</form>
	</div>
</div>