<div class="panel panel-info">
	<div class="panel-heading">Edit Project</div>
	<div class="panel-body">
		<form method="POST" role="form">
			<div class="row">
				<div class="form-group col-md-6">
					<label>Name</label>
					<input name="title" value="<?php echo $item->title; ?>" type="text" class="form-control" placeholder="Name of Organization or Client"/>
				</div>
				<div class="form-group col-md-6">
					<label>Charge per Hour</label>
					<input name="hourly_rate" value="<?php echo $item->hourly_rate; ?>" type="text" class="form-control" placeholder="Your hourly rate"/>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-6">
					<label>Organization</label>
					<select name="organization_id" class="form-control">
					<?php 
						$vals = array();
						if( count( $organizations ) ){
							for( $i = 0, $c = count( $organizations ); $i < $c; $i++ ){
								$vals []=
									array(
										'value' => $organizations[$i]->{'id'},
										'text' =>  $organizations[$i]->{'title'},
								);
							}
						}
						echo \Dsc\Html\Select::options( $vals, $flash->old('organization.id'));
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label>Description</label>
					<textarea rows="5" cols="70" name="description" id="description" placeholder="A short description of organization"><?php echo $item->description; ?></textarea>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-2 form-group">
					<button type="submit" class="btn btn-success">Save</button>
					<a href="./projects" class="btn btn-warning">Back</a>
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