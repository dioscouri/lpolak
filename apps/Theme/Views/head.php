<base href="<?php echo $SCHEME . "://" . $HOST . $BASE . "/"; ?>" />
<link href="minify/css" type="text/css" rel="stylesheet">
<script src="minify/js"></script>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="icon" type="image/ico" href="site/images/favicon.ico" />

<title><?php echo $this->app->get('meta.title'); ?></title>

<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="keywords" content="<?php echo $this->app->get('meta.keywords'); ?>" />
<meta name="description" content="<?php echo $this->app->get('meta.description'); ?>" />
<meta name="generator" content="<?php echo $this->app->get('meta.generator'); ?>" />    

<meta property="og:title" content="<?php echo $this->app->get('og.site_name'); ?>" />
<meta property="og:type" content="<?php echo $this->app->get('og.type'); ?>" />
<meta property="og:image" content="<?php echo $SCHEME . "://" . $HOST . $BASE . "/"; ?>site/images/og-image.jpg" />
<meta property="og:url" content="<?php echo $SCHEME . "://" . $HOST . $BASE . "/"; ?>" />
<meta property="og:site_name" content="<?php echo $this->app->get('og.site_name'); ?>" />
<meta property="og:description" content="<?php echo $this->app->get('og.description'); ?>" />
<meta property="fb:app_id" content="<?php echo $this->app->get('fb.appId'); ?>" />