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
            'theme/js/jquery-2.1.1.min.js',
            'theme/js/bootstrap/bootstrap.min.js',
        	'js/main.js',
        	'theme/js/plugins/metisMenu/jquery.metisMenu.js',
        	'theme/js/sb-admin.js',
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
            'theme/css/font-awesome.min.css',
            'theme/css/bootstrap.min.css',
            'css/flexslider.css',
			'theme/css/sb-admin.css',
		);
	}

}
$app = new ThemeBootstrap();
?>