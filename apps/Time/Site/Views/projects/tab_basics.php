			<div class="row">
				<div class="form-group col-md-6">
					<label>Name</label>
					<input name="title" value="<?php echo $flash->old('title') ?>" type="text" class="form-control" placeholder="Project Name"/>
				</div>
				<div class="form-group col-md-6">
					<label>Charge per Hour</label>
					<input name="charging_rat" value="<?php echo $flash->old('charging_rat') ?>" type="text" class="form-control" placeholder="Your charging rate"/>
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
					<textarea class="form-control" rows="5" cols="70" name="description" id="description" placeholder="A short description of organization"><?php echo $flash->old('description') ?></textarea>
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