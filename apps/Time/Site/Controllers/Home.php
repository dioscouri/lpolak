<?php 
namespace Time\Site\Controllers;

class Home extends \Time\Site\Controllers\Base
{
    public function index()
    {
        echo \Dsc\System::instance()->get('theme')->renderTheme('Time\Site\Views::dashboard/view.php');
    }
}