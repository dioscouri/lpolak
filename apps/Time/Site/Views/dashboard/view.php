<h1>Dashboard</h1>

<div class="row">
	<div class="col-md-8">
		<?php echo $this->renderLayout('Time/Site/Views::dashboard/list.php'); ?>
	</div>
	<div class="col-md-4">
		<?php echo $this->renderLayout('Time/Site/Views::dashboard/time.php'); ?>
	</div>
</div>