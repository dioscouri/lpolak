<?php 
namespace Time\Site\Controllers;

class Organization extends \Time\Site\Controllers\Base
{
    public function index()
    {
        echo \Dsc\System::instance()->get('theme')->renderTheme('Time\Site\Views::projects/list.php');
    }
}