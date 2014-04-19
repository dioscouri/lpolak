<?php 
$f3 = \Base::instance();
$global_app_name = $f3->get('APP_NAME');

switch ($global_app_name) 
{
    case "admin":
        // register the template'e module positions
        //\Modules\Factory::registerPositions( array('theme-promo', 'theme-footer', 'theme-above-content', 'theme-below-content') );
        
        // register the modules path
        // register event listener

        
        break;
        
    case "site":
        // register all the routes
        //$f3->route('GET /minify/@type', '\Theme\Controllers\Minify->@type'); // moved to f3-minify
        
        $f3->set('TEMPLATES', $f3->get('PATH_ROOT') . "apps/Theme/Templates/");
        
        \Dsc\System::instance()->get('theme')->setTheme('Theme', $f3->get('PATH_ROOT') . 'apps/Theme/' );
        \Dsc\System::instance()->get('theme')->registerViewPath( $f3->get('PATH_ROOT') . 'apps/Theme/Views/', 'Theme/Views' );
        
        // append this app's UI folder to the path
        $ui = $f3->get('UI');
        $ui .= ";" . $f3->get('PATH_ROOT') . "apps/Theme/Views/;" . $f3->get('PATH_ROOT') . "apps/Theme/Media/";
        $f3->set('UI', $ui);

        // tell Minify where to find Media, CSS and JS files
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/theme/");
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/");
        
        // register the less css file
        \Minify\Factory::registerLessCssSource( $f3->get('PATH_ROOT') . "apps/Theme/Less/global.less.css" );
        
        // add the media assets to be minified        
        $files = array(
            /*
            'bootstrap/css/bootstrap.css',
            'dsc/css/common.css',
            'colorbox/colorbox.css',
            'rmm/css/mega-menu.css',
            'rmm/css/mega-menu-responsive.css',
            'rmm/css/customized.css',
            'site/css/global.css'
            */
            'dsc/css/common.css',
            'css/font-awesome.min.css',
            'css/bootstrap.min.css',
            'css/flexslider.css',
            'css/chosen.css',
            'css/slider.css',
            'css/style.css',
            //'rmm/css/mega-menu.css',
            //'rmm/css/mega-menu-responsive.css',
            'rmm/css/customized.css',
            'vendor/jqzoom/jqzoom.css',
        );
        
        foreach ($files as $file) 
        {
            \Minify\Factory::css($file);
        }
        
        $files = array(
            /*
            'jquery/core/jquery-2.0.3.js',
            'site/js/modernizr-2.6.2.min.js',
            'colorbox/colorbox.js',
            'bootstrap/js/bootstrap.js',
            'site/js/bootstrap-hover-dropdown.js',
            'rmm/js/fitvid.js',
            'dsc/js/noconflict.js',
            'dsc/js/class.js',
            'dsc/js/validation.js',
            'dsc/js/common.js',
            'site/js/common.js'
            */
            'js/vendor/modernizr-2.6.2-respond-1.1.0.min.js',
            'js/vendor/jquery-1.10.1.min.js',
            'js/vendor/jquery.flexslider-min.js',
            'js/vendor/jquery.jcarousel.min.js',
            'js/vendor/jquery.placeholder.min.js',
            'js/vendor/tinynav.min.js',
            'js/vendor/jquery.raty.min.js',
            'js/vendor/chosen.jquery.min.js',
            'js/vendor/bootstrap-slider.js',
            'js/vendor/bootstrap.min.js',
            'site/js/bootstrap-hover-dropdown.js',
            'vendor/jqzoom/jqzoom.js',                        
            'js/main.js',
            'js/custom.js',
        );

        foreach ($files as $file)
        {
            \Minify\Factory::js($file);
        }
        
        break;
}
?>