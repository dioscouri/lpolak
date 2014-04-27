<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html> <!--<![endif]-->

<head>
    <?php echo $this->renderView('Theme/Views::head.php'); ?>
</head>

<body class="dsc-wrap <?php echo !empty($body_class) ? $body_class : 'default-body'; ?>" role="document">

    <?php echo $this->renderView('Theme/Views::nav/top.php'); ?>
	
	<div id="content" class="dsc-wrap">		

    	<div id="content-container" class="dsc-wrap">
    	
            <?php if (\Dsc\System::instance()->getMessages(false)) { ?>
            <div class="container margin-top">
                <tmpl type="system.messages" />
            </div>
            <?php } ?>
    
            <section id="main">
                <tmpl type="view" />
            </section>
        
    	</div> <!-- /#content-container -->
    
    </div> <!-- #content -->
    
    <?php //echo $this->renderView('Theme/Views::footer.php'); ?>
    
</body>

</html>