<?php 
namespace Time\Site\Controllers;

class Projects extends \Time\Site\Controllers\Base
{
    public function index()
    {
        echo \Dsc\System::instance()->get('theme')->renderTheme('Time\Site\Views::projects/list.php');
    }
}