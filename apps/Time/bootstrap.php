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
        return	array(
        			'js/plugins/select2/select2.min.js',
        			'js/notes.js',
        			'js/common_time.js',
        			''
        );
    }
    
    /**
     * This method returns list of CSS files to be added to header
     *
     * @param $app	Name of currently selected application (site or admin)
    */
    protected function getCSS($app){
    	return array(
    			'css/select2/select2.bootstrap.css',
    	);
    }
    
}
$app = new TimeBootstrap();