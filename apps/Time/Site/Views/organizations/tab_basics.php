	<div class="row">
		<div class="col-lg-2 col-md-3 col-xs-4">
			<h3>Basics</h3>
		</div>
		<div class="col-lg-10 col-md-9 col-xs-8">
			<div class="form-group">
				<label>Name</label>
				<input name="title" value="<?php echo $flash->old('title') ?>" type="text" class="form-control" placeholder="Name of Organization or Client"/>
			</div>
			<div class="form-group">
				<label>Description</label>
				<textarea class="form-control" name="description" id="description" rows="5" placeholder="A short description of organization"><?php echo $flash->old('description') ?></textarea>
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
				<label>Name</label>
				<input name="contacts[name]" value="<?php echo $flash->old('contacts.name') ?>" type="text" class="form-control" placeholder="Contact Name"/>
			</div>
			<div class="form-group">
				<label>Email</label>
				<input name="contacts[email]" value="<?php echo $flash->old('contacts.email') ?>" type="email" class="form-control" placeholder="Contact Email"/>
			</div>
			<div class="form-group">
				<label>Telephone</label>
				<input name="contacts[telephone]" value="<?php echo $flash->old('contacts.telephone') ?>" type="text" class="form-control" placeholder="Contact Telephone"/>
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
