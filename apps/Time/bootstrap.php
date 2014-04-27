<?php

class TimeBootstrap extends \Dsc\Bootstrap\App
{
    protected $dir = __DIR__;
    protected $namespace = 'Time';

    protected function runSite(){
    	parent::runSite();
    }
    
    /**
     * This method returns list of javascript files to be added to header
     *
     * @param $app	Name of currently selected application (site or admin)
     */
    protected function getJS($app){
        return array(
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
            'js/custom/remove_broken_images.js',
        );
    }
    
    /**
     * This method returns list of CSS files to be added to header
     *
     * @param $app	Name of currently selected application (site or admin)
    */
    protected function getCSS($app){
    	return array(
            'dsc/css/common.css',
            'css/font-awesome.min.css',
            'css/bootstrap.min.css',
            'css/flexslider.css',
            'css/chosen.css',
            'css/slider.css',
            'css/style.css',
            'rmm/css/customized.css',
            'vendor/jqzoom/jqzoom.css',
        );
    }
    
}
$app = new TimeBootstrap();