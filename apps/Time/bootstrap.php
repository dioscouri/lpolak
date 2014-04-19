<?php

class TimeBootstrap extends \Dsc\Bootstrap\App
{
    protected $dir = __DIR__;
    protected $namespace = 'Time';

    /**
     * This method returns list of javascript files to be added to header
     *
     * @param $app	Name of currently selected application (site or admin)
     */
    protected function getJS($app){
    	return array();
    }
    
    /**
     * This method returns list of CSS files to be added to header
     *
     * @param $app	Name of currently selected application (site or admin)
    */
    protected function getCSS($app){
    	return array();
    }
    
}
$app = new TimeBootstrap();