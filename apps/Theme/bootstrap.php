<?php 

class ThemeBootstrap extends \Dsc\Bootstrap\App
{
	protected $dir = __DIR__;
	protected $namespace = 'Theme';

	protected function runSite(){
   		parent::runSite();
		$f3 = \Base::instance();
        \Dsc\System::instance()->get('theme')->setTheme('Theme', $f3->get('PATH_ROOT') . 'apps/Theme/' );
	}
	
	/**
	 * This method returns list of javascript files to be added to header
	 *
	 * @param $app	Name of currently selected application (site or admin)
	 */
	protected function getJS($app){
        return array(
            'js/vendor/modernizr-2.6.2-respond-1.1.0.min.js',
            'jquery/core/jquery-2.1.0.min.js',
            'js/vendor/jquery.flexslider-min.js',
            'js/vendor/jquery.jcarousel.min.js',
            'js/vendor/jquery.placeholder.min.js',
            'js/vendor/bootstrap-slider.js',
            'bootstrap/js/bootstrap.min.js',
            'bootbox/bootbox.js',
        	'js/main.js',
            'js/custom.js',
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
            'bootstrap/css/bootstrap.min.css',
            'css/flexslider.css',
            'css/chosen.css',
            'css/slider.css',
            'css/style.css',
		);
	}

}
$app = new ThemeBootstrap();
?>