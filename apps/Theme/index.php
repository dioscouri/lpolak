<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->

<head>
    <?php echo $this->renderView('Theme/Views::head.php'); ?>
</head>

<body class="dsc-wrap <?php echo !empty($body_class) ? $body_class : 'default-body'; ?>" role="document">

	<div id="wrapper">
    	<?php echo $this->renderView('Theme/Views::nav/left.php'); ?>
	
		<div id="page-wrapper">
            <?php if (\Dsc\System::instance()->getMessages(false)) { ?>
            <div class="container margin-top">
                <tmpl type="system.messages" />
            </div>
            <?php } ?>
    
            <section id="main">
                <tmpl type="view" />
            </section>
            
    <?php $debug = true; if ($this->app->get('DEBUG') && $debug) { ?>
    <div class="clearfix">
        <div class="stats list-group">
            <h4>Stats</h4>
            <div class="list-group-item">
                <?php echo \Base::instance()->format('Page rendered in {0} msecs / Memory usage {1} KB',round(1e3*(microtime(TRUE)-$TIME),2),round(memory_get_usage(TRUE)/1e3,1)); ?>
            </div>
        </div>
        
        <tmpl type="system.loaded_views" />
        
    </div>
    <?php } ?>
            
		</div>
	</div>
	
</body>

</html>