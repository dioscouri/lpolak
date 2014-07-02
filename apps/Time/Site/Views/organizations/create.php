<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Create Organization</h1>
	</div>
</div>
<form method="POST" role="form" class="form" id="organization-form">
    <div class="clearfix">

        <div class="pull-right">
			<button type="submit" class="btn btn-success">Save</button>
			&nbsp;
			<a href="./organizations" class="btn btn-warning">Back</a>
		</div>

    </div>

    <ul class="nav nav-tabs">
        <li class="active">
            <a href="#tab-basics" data-toggle="tab"> Basics </a>
        </li>
    </ul>
    <div class="tab-content padding-10">
    
        <div class="tab-pane active" id="tab-basics">
        
            <?php echo $this->renderLayout('Time/Site/Views::organizations/tab_basics.php'); ?>
        
        </div>
        <!-- /.tab-pane -->
        
    </div>
    
</form>