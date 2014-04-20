<?php 
namespace Time\Site\Controllers;

/**
 * Controller takink care of being logged in to access some parts of the site
 * @author 3lf
 *
 */
class BaseAuth extends \Time\Site\Controllers\Base
{
    public function beforeRoute($f3)
    {
/*    	
        $identity = $this->getIdentity();
        if (empty($identity->id))
        {
            $f3->reroute('/admin/login');
        }
*/
    }    
}
?>