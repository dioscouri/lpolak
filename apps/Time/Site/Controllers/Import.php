<?php 
namespace Time\Site\Controllers;

class Import extends \Time\Site\Controllers\Base
{
	
	protected function getModel()
	{
		$model = new \Time\Models\Organization;
		return $model;
	}
        
    public function index()
    {
        $model = $this->getModel();
        
        $view = \Dsc\System::instance()->get('theme');
        echo $view->render('Time/Site/Views::importer/form.php');
    }
    
    public function import(){
    	$f3 = \Base::instance();
    	$data = $f3->get('REQUEST');
    	$username = $this->inputfilter->clean( $data['username'], 'string' );
    	$password = $this->inputfilter->clean( $data['password'], 'string' );
    	
    	$this->handleImport( $username, $password );
    }
    
    private function handleImport($username, $password){
    	// first log in
    	// https://lesstimespent.com/login
    	$curl = curl_init( 'https://lesstimespent.com/login' );
    	$opts = array(
    			CURLOPT_FOLLOWLOCATION 	=> true,
    			CURLOPT_HTTPGET 		=> false, // use POST method
    			CURLOPT_POST 			=> true,
    			CURLOPT_AUTOREFERER    	=> true,
    			CURLOPT_RETURNTRANSFER 	=> true, // return result as a string
    			CURLOPT_HEADER			=> false,
    			CURLOPT_NOBODY			=> false,
    			CURLOPT_POSTFIELDS		=> array( 'login' => $username, 'password' => $password, 'commit' => 'Log Me In' ),
    			CURLOPT_TIMEOUT			=> 5,
    			CURLOPT_COOKIE			=> 'auth_token=; _morehoney_session=BAh7CToJdXNlcmkCHxE6DnJldHVybl90byIGLyIKZmxhc2hJQzonQWN0aW9uQ29udHJvbGxlcjo6Rmxhc2g6OkZsYXNoSGFzaHsGOgtub3RpY2UiFkhlbGxvIEx1a2FzIFBvbGFrBjoKQHVzZWR7BjsIRjoNbmV3X3VzZXIw--524452376468119e1e4717f11277c1100a30aadf',
    	);
    	
    	curl_setopt_array($curl, $opts);
    	curl_exec( $curl );

    	$opts = array(
    		CURLOPT_URL => 'https://lesstimespent.com/projects',
   			CURLOPT_HTTPGET 		=> true, // use POST method
  			CURLOPT_POST 			=> false,
    			);
    	curl_setopt_array($curl, $opts);
    	$res = curl_exec( $curl );
    	
    	require __DIR__.'/../../Library/ganon.php';
    	$dom_projects = str_get_dom( $res );

    	$projects = $dom_projects('div.projects_row');
    	
    	print_r( $projects );
    }
}