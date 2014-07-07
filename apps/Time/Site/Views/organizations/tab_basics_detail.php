	<div class="row">
		<div class="col-lg-2 col-md-3 col-xs-4">
			<h3>Basics</h3>
		</div>
		<div class="col-lg-10 col-md-9 col-xs-8">
			<div class="form-group">
				<label>Name</label><br />
				<?php echo $item->{'title'} ?>
			</div>
			<div class="form-group">
				<label>Description</label><br />
				<?php echo $item->{'description'} ?>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-lg-2 col-md-3 col-xs-4">
				<h3>Contacts</h3>
		</div>
		<div class="col-lg-10 col-md-9 col-xs-8">
			<div class="form-group">
				<label>Name</label><br />
				<?php echo $item->{'contacts.name'} ?>
			</div>
			<div class="form-group">
				<label>Email</label><br />
				<?php echo $item->{'contacts.email'} ?>
			</div>
			<div class="form-group">
				<label>Telephone</label><br />
				<?php echo $item->{'contacts.telephone'} ?>
			</div>
		</div>
	</div>
	<hr />
	<div class="row">
		<div class="col-lg-2 col-md-3 col-xs-4">
				<h3>Additional Information</h3>
		</div>
		<div class="col-lg-10 col-md-9 col-xs-8">
			<div class="form-group">
				<label>Tags</label>
			</div>
		</div>
	</div>
